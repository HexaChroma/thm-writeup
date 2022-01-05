import pty

def test(num):
    if(num == 1):
        pty.spawn('/bin/bash')

