import os
import subprocess

os.system('cd /home/path-to-folder/')
os.system('echo ubuntu | sudo -S')
os.system("source bin/activate")
subprocess.call("source bin/activate", shell=True)
os.system('./manage.py runserver 8001')
