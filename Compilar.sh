#!/bin/bash
# -*- ENCODING: UTF-8 -*-
chmod -R 777 cache/
chmod -R 777 lib/
chmod -R 777 data/
chmod -R 777 log/

php5 symfony doctrine:build-schema
php5 symfony doctrine:build --model
php5 symfony doctrine:build --forms
php5 symfony doctrine:build --filters
php5 symfony doctrine:build --sql
php5 symfony doctrine:build --all-classes 
php5 symfony cc

rm -rf cache/agtrials/
