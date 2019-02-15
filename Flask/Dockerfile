FROM python:3.4-alpine

# Meta Information
MAINTAINER Kiteretsu "teamprobably@gmail.com"

ADD . /code

WORKDIR /code

# update
RUN apt update

RUN apt install -y \
	git 
	

RUN pip install -r requirements.txt
RUN pip install git+https://github.com/abenassi/Google-Search-API

CMD ["python", "app.py"]

