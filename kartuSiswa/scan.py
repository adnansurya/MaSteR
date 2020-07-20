import os
import subprocess
import datetime
import requests 
import base64
import json


apiurl = 'http://localhost/absen.php'

def encodeimg64():
    with open('/home/pi/images.jpg','rb') as image_file:
        encoded_string = base64.b64encode(image_file.read())
        return encoded_string


print("SCAN KARTU")
while True:

    myCmd = os.popen('nfc-poll').read()

    data_list = myCmd.splitlines()

    matching = [s for s in data_list if "UID" in s]

    if matching == []:
        print("UID tidak ditemukan")
    else:
        waktu = datetime.datetime.now()
        #waktu = waktu.replace(' ', '_')
        uid_line = matching[0].strip()
        uid = uid_line.split(':')[1].strip()
        uid = uid.replace('  ', '')
        print(uid)
        subprocess.call("fswebcam -r 640x480 /home/pi/images.jpg",shell=True)
        #print('PIC CAPTURED: ' + waktu)
        gambar = encodeimg64()
        #print(gambar)
            
        data = {
            'token' : uid,
            'gambar' : gambar,
            'waktu' : waktu
        }
        r = requests.post(url = apiurl, data = data) 
        response_text = r.text 
        print("RESPONSE : %s"%response_text)
        
        jsonRes = json.loads(response_text)
        responResult = jsonRes['result']
        print(responResult)
        if responResult == "success":           
            print(jsonRes['data']['nama'])  
            print(jsonRes['data']['waktu'])
        elif responResult == "unknown":
            print("Token : %s"%jsonRes['data'])
        elif responResult == "error":
            print("Server Error : %s"%jsonRes['data'])  

