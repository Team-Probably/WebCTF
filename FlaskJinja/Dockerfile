FROM python:3.6

LABEL maintainer="teamprobably@gmail.com"

RUN mkdir /app
WORKDIR /app

COPY requirements.txt /app/
RUN pip install --no-cache-dir -r requirements.txt
RUN pip install git+https://github.com/abenassi/Google-Search-API

COPY . /app

EXPOSE 5000

CMD ["python", "app.py"]
