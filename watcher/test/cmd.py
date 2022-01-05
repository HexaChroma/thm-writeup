import os
import pty
def get_command(num):
    if(num == "1"):
        print('1')
        pty.spawn('/bin/bash')
        return "ls -lah"
    if(num == "2"):
        return "id"
    if(num == "3"):
        return "cat /etc/passwd"
