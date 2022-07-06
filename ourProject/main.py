import numpy as np
import pandas as pd
from sklearn.metrics import confusion_matrix
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.ensemble import RandomForestClassifier
from sklearn import metrics

dataset=pd.read_csv("heart.csv");


from sklearn.model_selection import train_test_split
x = dataset.iloc[:,:-1].values
y = dataset.iloc[:,-1].values
x_train,x_test,y_train,y_test=train_test_split(x,y,test_size=.2,random_state=2)

from sklearn.preprocessing import StandardScaler

sc = StandardScaler()
X_train = sc.fit_transform(x_train)
X_test = sc.transform(x_test)

from sklearn.ensemble import RandomForestClassifier
rf = RandomForestClassifier(n_estimators = 1000, random_state = 2)
rf.fit(x_train, y_train)
y_pred = rf.predict(x_test)


acc = rf.score(x_test,y_test)*100

print("Random Forest Algorithm Accuracy Score : {:.2f}%".format(acc))

# print(np.argmax(rf.predict(np.array(([[44,1,1,120,263,0,1,173,0,0,2,0,3]])),axis=0)))
# print(rf.predict([[65,1,0,110,248,0,0,158,0,0.6,2,2,1]]))

import pickle 
with open("m_pickle","wb")as f:
    pickle.dump(rf,f)
with open("m_pickle","rb")as f :
    mp=pickle.load(f)
#print(mp.predict([[58,0,0,130,197,0,1,131,0,0.6,1,0,2]]))


acc = rf.score(x_test,y_test)*100
print("Random Forest Algorithm Accuracy Score : {:.2f}%".format(acc))
from sklearn.metrics import classification_report, confusion_matrix, accuracy_score
from sklearn.ensemble import RandomForestRegressor
y_pred = rf.predict(x_test)
print(confusion_matrix(y_test,y_pred))
print(classification_report(y_test,y_pred))
print(accuracy_score(y_test, y_pred))
print(rf.predict(65,1,0,110,248,0,0,158,0,0.6,2,2,1))

#print(accuracy_score(x_train,y_train))
#print(accuracy_score(x_test,y_pred)
# if __name__ == "__main__":

#     in_file = open("./heart1.csv", "r")
#     reader = csv.reader(in_file)
#     my_list=list(reader)
#     print(mp.predict(my_list))
#     in_file.close()

#     my_list[1][14]=ans[0]
#     out_file = open("./heart1.csv", "w", newline = '')
#     csv_writer = csv.writer(out_file)
#     csv_writer.writerows(my_list)
#     out_file.close()