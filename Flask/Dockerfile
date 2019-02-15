# Meta Information
MAINTAINER Kiteretsu "teamprobably@gmail.com"

FROM python:3.4-alpine

ADD . /code

WORKDIR /code

RUN pip install -r requirements.txt
RUN pip install git+https://github.com/abenassi/Google-Search-API

CMD ["python", "app.py"]

