# Kafka Messages

## Produce

```
echo "Hello, World" | /opt/bitnami/kafka/bin/kafka-console-producer.sh --broker-list kafka:9092 --topic demo > /dev/null
```

## Consume

```
/opt/bitnami/kafka/bin/kafka-console-consumer.sh --bootstrap-server kafka:9092 --topic demo
```

