#!/usr/bin/env python3
import paho.mqtt.client as mqtt

#This is the callback when the client receives CONNACK response from the server
def on_connect(client, userdata, flags, rc):
    
    print("Connected w/ result code="+str(rc))

    # Subscribing in on_connect() means that if we lose the connection and
    # reconnect then subscriptions will be renewed.
    client.subscribe("secret_chat")

def on_message(client, userdata, msg):
    print(msg.topic+' '+str(msg.payload))

client = mqtt.Client(protocol=mqtt.MQTTv31)
client.on_connect = on_connect
client.on_message = on_message
client.connect("10.10.147.15", 1883, 60)

client.loop_forever()
