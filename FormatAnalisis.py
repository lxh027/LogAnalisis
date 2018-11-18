#!/usr/bin/env python
#-*- coding:utf-8 -*-

import re
import os,sys
import MySQLdb
import time,datetime

class Format(object):
    
    def __init__(self,content):
        self.__content=content

    def size(self):
        return self.__content.count('$')

    def reVar(self):
        return r'\$[0-9a-zA-Z\_]+'

    def reTar(self):
        former=self.__content
        former=former.replace('[','\\[')
        former=former.replace(']','\\]')
        former=former.replace('(','\\(')
        former=former.replace(')','\\)')
        var=re.compile(r''+self.reVar())
        expression=var.sub(r'(.*)',former)
        return r''+expression

class Dict(object):
    def __init__(self,tar,var,retar,revar):
        self.__tar=tar
        self.__var=var
        self.__retar=re.compile(r''+retar)
        self.__revar=re.compile(r''+revar)
    
    def makelist(self):
        S=self.__revar.findall(self.__var)
        for i in range(len(S)):
            S[i]=S[i].replace('$','')
        return S

    def makedict(self):
        D={}
        S=self.makelist()
        for i in range(len(S)):
            D[S[i]]=re.match(self.__retar,self.__tar).group(i+1)
        return D

class SQL(object):
    
    def __init__(self,name):
        t=datetime.datetime.now().strftime('%Y%m%d')
        self.__varname=name
        self.__name=name+'_'+t
        self.__name=re.sub(r'[^0-9a-zA-Z]','_',self.__name)
        self.__name=re.sub(r'[^\x00-\xff]','',self.__name)
        config={'host':'localhost','port':3306,'user':'lxh001','passwd':'19991107','db':'LOGAnalisis','charset':'utf8'}
        self.__conn=MySQLdb.connect(**config)
        self.__cursor=self.__conn.cursor()

    def makeSQL(self):
        SQLname='LOGAnalisis'
        self.__cursor.execute('DROP DATABASE IF EXISTS %s' %SQLname)
        self.__cursor.execute('CREATE DATABASE IF NOT EXISTS %s default charset=utf8' %SQLname)
        self.__conn.select_db(SQLname)

    def maketable(self):
        TABLE_NAME=self.__name
        self.__cursor.execute('CREATE TABLE %s(id int unsigned auto_increment primary key)' %TABLE_NAME)
        with open('data/'+self.__varname+'.log.format','r') as f:
            self.var=f.read().strip()
            self.format=Format(self.var)
            self.__list=Dict('',self.var,'',self.format.reVar()).makelist()
        for headname in self.__list:
            self.__cursor.execute('ALTER TABLE %s ADD %s varchar(2000)' %(TABLE_NAME,headname))     

    def insertdata(self):
        with open('data/'+self.__varname+'.log','r') as f:
            for line in f.readlines():
                log=line.strip()
                D=Dict(log,self.var,self.format.reTar(),self.format.reVar())
                self.logDict=D.makedict()
                keyList=self.logDict.keys()
                valueList=self.logDict.values()
                self.__makedata(keyList,valueList)
                self.__cursor.execute(self.__code,self.__value)
            

    def __makedata(self,keylist,valuelist):
        num=[]
        for i in range(len(keylist)):
            num.append("%s")
        tmp=str(tuple(keylist))
        tmp=re.sub(r'\'','',tmp)
        tmp2=str(tuple(num))
        tmp2=re.sub(r'\'','',tmp2)
        self.__code='INSERT INTO '+self.__name+tmp+' VALUES '+tmp2
        for i in range(len(valuelist)):
            valuelist[i]=u''+valuelist[i]
        self.__value=tuple(valuelist)

if __name__=='__main__':
    defaultencoding = 'utf-8'
    if sys.getdefaultencoding() != defaultencoding:
        reload(sys)
        sys.setdefaultencoding(defaultencoding)
    _name=[]
    for root,dirs,files in os.walk('data/'):
        for file in files:
            if os.path.splitext(file)[1]=='.log':
                _name.append(os.path.splitext(file)[0])
    SQL('').makeSQL()
    for filename in _name:
        S=SQL(filename)
        S.maketable()
        S.insertdata()

    '''
    SQL('').makeSQL()
    name='api-game.wutnews.net-20181024.access'
    S=SQL(name)
    S.maketable()
    S.insertdata()    '''



