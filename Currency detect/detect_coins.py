# import classifier
from sklearn.neural_network import MLPClassifier
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.metrics import confusion_matrix
import mahotas as mh
import math
import numpy as np
import argparse
import glob
import cv2
from sklearn.preprocessing import StandardScaler ,LabelEncoder, MinMaxScaler

label_encoder = LabelEncoder()

# construct argument parser and parse arguments
ap = argparse.ArgumentParser()
ap.add_argument("-i", "--image", required=True, help="path to image")
args = vars(ap.parse_args())

def calcHistFromFile(img):
    # create mask
    img = mh.imread(img) 
    img = mh.colors.rgb2gray(img, dtype=np.uint8) 
    clahe = cv2.createCLAHE(clipLimit=2.0, tileGridSize=(8, 8))
    img = clahe.apply(img)
    ft = mh.features.haralick(img).ravel()
    return ft

# define Enum class
class Enum(tuple): __getattr__ = tuple.index

# Enumerate material types for use in classifier
Material = Enum(('Five','Ten','Twenty','Fifty','Onehundred','Twohundred','Fivehundred'))

# locate sample image files
sample_images_copper1 = glob.glob("sample_images/eu/Five/*")
sample_images_copper2 = glob.glob("sample_images/eu/Ten/*")
sample_images_copper3 = glob.glob("sample_images/eu/Twenty/*")
sample_images_copper4 = glob.glob("sample_images/eu/Fifty/*")
sample_images_copper5 = glob.glob("sample_images/eu/Onehundred/*")
sample_images_copper6 = glob.glob("sample_images/eu/Twohundred/*")
sample_images_copper7 = glob.glob("sample_images/eu/Fivehundred/*")

# define training data and labels
X = []
y = []

# compute and store training data and labels
for i in sample_images_copper1:
    X.append(calcHistFromFile(i))
    y.append(Material.Five)
for i in sample_images_copper2:
    X.append(calcHistFromFile(i))
    y.append(Material.Ten)
for i in sample_images_copper3:
    X.append(calcHistFromFile(i))
    y.append(Material.Twenty)
for i in sample_images_copper4:
    X.append(calcHistFromFile(i))
    y.append(Material.Fifty)
for i in sample_images_copper5:
    X.append(calcHistFromFile(i))
    y.append(Material.Onehundred)
for i in sample_images_copper6:
    X.append(calcHistFromFile(i))
    y.append(Material.Twohundred)        
for i in sample_images_copper7:
    X.append(calcHistFromFile(i))
    y.append(Material.Fivehundred)       


# instantiate classifier
# Multi-layer Perceptron

clf = LogisticRegression(random_state=0, solver='lbfgs',multi_class='multinomial',class_weight="balanced")

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=.4)

# scaler = MinMaxScaler(feature_range = (0,1))
# scaler.fit(X_train)
# X_train = scaler.transform(X_train)
# X_test = scaler.transform(X_test)

clf.fit(X_train, y_train)
y_pred = clf.predict(X_test)
score = int(clf.score(X_test, y_test) * 100)
print("Classifier mean accuracy: ", score)

cm = confusion_matrix(y_test, y_pred)
print(cm)

def predictMaterial():
    image = mh.imread(args["image"])
    image = mh.colors.rgb2gray(image, dtype=np.uint8) 
    # resize image while retaining aspect ratio
    # d = 1024 / image.shape[1]
    # dim = (1024, int(image.shape[0] * d))
    # image = cv2.resize(image, dim, interpolation=cv2.INTER_AREA)
    clahe = cv2.createCLAHE(clipLimit=2.0, tileGridSize=(8, 8))
    img = clahe.apply(image)
    ft = mh.features.haralick(img).ravel()
    s = clf.predict([ft])
    return Material[int(s)]

print("Classifier predict: ",predictMaterial())
cv2.waitKey(0)
