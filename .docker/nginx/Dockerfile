FROM nginx:latest

ARG TZ

RUN echo ${TZ} > /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata

RUN apt-get install -y bash
