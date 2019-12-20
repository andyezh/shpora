FROM redis:latest

ARG TZ

RUN echo ${TZ} > /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata

CMD ["redis-server"]
