FROM nginx:1.21.6-alpine

RUN rm -rf /app/
COPY . /app/
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf