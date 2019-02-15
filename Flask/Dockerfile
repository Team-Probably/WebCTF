FROM ubuntu:16.04

# Meta Information
MAINTAINER Kiteretsu "teamprobably@gmail.com"

ADD . /code

WORKDIR /code

# update
RUN apt update

RUN apt install -y \
	git \
	python3-pip


RUN pip3 install -r requirements.txt
RUN pip3 install git+https://github.com/abenassi/Google-Search-API

CMD ["python3","app.py"]
