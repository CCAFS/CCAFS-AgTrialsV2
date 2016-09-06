#!/bin/bash
# -*- ENCODING: UTF-8 -*-
chmod -R 777 cache/
php5 symfony cc
rm -rf cache/agtrials/
