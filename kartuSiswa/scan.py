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
        subprocess.call("fswebcam /home/pi/images.jpg",shell=True)
        #print('PIC CAPTURED: ' + waktu)
        gambar = encodeimg64()
        #print(gambar)
            
        data = {
            'token' : uid,
            'gambar' : gambar,
            'waktu' : waktu
        }
        r = requests.post(url = apiurl, data = data) 
        pastebin_url = r.text 
        print("The pastebin URL is:%s"%pastebin_url)  

