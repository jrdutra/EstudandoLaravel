#!/bin/bash
git add --all
read -p 'Mensagem: ' MSG
git commit -m $MSG
git push
read
