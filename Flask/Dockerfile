FROM python:3.4-alpine

# Meta Information
MAINTAINER Kiteretsu "teamprobably@gmail.com"

ADD . /code

WORKDIR /code
RUN apt-get update
RUN apt-get install git
RUN pip install -r requirements.txt
RUN pip install git+https://github.com/abenassi/Google-Search-API

CMD ["python", "app.py"]

