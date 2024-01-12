FROM node:16-alpine AS assets-build

WORKDIR /var/www/html

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

COPY . /var/www/html/

# RUN npm ci
# RUN npm run production

FROM nginx:latest AS nginx

COPY /resources/ops/docker/nginx/vhost.conf /etc/nginx/conf.d/default.conf 

# COPY /resources/ops/docker/nginx/vhost.conf /etc/nginx/conf.d/default.conf
# COPY --from=assets-build /var/www/html/public /var/www/html/