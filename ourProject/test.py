

import pickle
import pandas as pd
import csv
import numpy as np 


import warnings 

if __name__ == "__main__":
 warnings.filterwarnings("ignore")

 with open("m_pickle","rb")as f :
    mp=pickle.load(f)


 d=pd.read_csv("heart1.csv");
 res=mp.predict(d)

# print(mp.predict([[69,0,3,140,239,0,1,151,0,1.8,2,2,2]]))#1


in_file = open("result.csv", "r")
reader = csv.reader(in_file)
my_list=list(reader)
in_file.close()

my_list[1][0]=res[0]
print(res[0])

out_file = open("result.csv", "w", newline = '')
csv_writer = csv.writer(out_file)
csv_writer.writerows(my_list)
out_file.close()


