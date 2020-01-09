# Install Kafka drivers

apt install librdkafka-dev

export RDK_PREFIX=/usr/local
wget https://github.com/edenhill/librdkafka/archive/v0.9.4.tar.gz  -O - | tar -xz
cd librdkafka-0.9.4/
./configure --prefix=$RDK_PREFIX
make
make install

export LD_LIBRARY_PATH=$LD_LIBRARY_PATH:$RDK_PREFIX/lib

pecl -q install rdkafka && \
    echo "extension=rdkafka.so" >> /etc/php/7.3/mods-available/30-kafka.ini && \
    ln -s /etc/php/7.3/mods-available/kafka.ini /etc/php/7.3/cli/conf.d/30-kafka.ini


RUN cd /tmp \
  && git clone https://github.com/edenhill/librdkafka.git \
  && cd librdkafka \
  && git checkout tags/v1.3.0 \
  && ./configure \
  && make \
  && make install \
  && rm -rf /tmp/*

RUN apt-get update -qq \
  && apt-get install -qq --no-install-recommends \
    libmagickwand-dev \
    libxslt-dev \
    kafkacat \
  && pecl install rdkafka-4.0.0 \
  && pecl install imagick \
  && docker-php-ext-install \
    xsl \
    ftp \
  && docker-php-ext-enable \
    imagick \
    rdkafka \
  && apt-get clean \
  && rm -rf /tmp/*

