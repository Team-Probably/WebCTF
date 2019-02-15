FROM ubuntu:16.04

# Meta Information
MAINTAINER Kiteretsu "teamprobably@gmail.com"

ADD . /code

WORKDIR /code

# update
RUN apt update

RUN apt install -y \
	python3-pip


RUN pip3 install -r requirements.txt

CMD ["python3","app.py"]
