#!/bin/bash

#------------------------------------------------
IP_SEGMENT="10.52.221."
IP_RANGE=2

ARCH=`uname -s`
#------------------------------------------------

while getopts "se" opts
do
  case $opts in
    s)
      FLG=start
      ;;
    e)
      FLG=end
      ;;
  esac
done

if [ ! -n "$FLG" ]; then
  echo "Usage $0 [option]"
  echo "   Option:"
  echo "      -s network start"
  echo "      -e network stop"
  exit 1
fi

function Mac_Net_Setting() {
  local flg=$1
  local ip=$2

  if [ $flg = "start" ]; then
    ifconfig lo0 alias ${ip}
  else
    ifconfig lo0 -alias ${ip}
  fi
}

function Linux_Net_Setting() {
  local flg=$1
  local ip=$2
  local num=`echo ${ip}|awk -F. '{ print $NF }'`

  if [ $flg = "start" ]; then
    ip addr add ${ip}/32 dev lo
  else
    ip addr del ${ip}/32 dev lo
  fi
}

function main() {
  for i in `seq 1 ${IP_RANGE}`;
  do
    if [ ${ARCH} = "Darwin" ]; then
      Mac_Net_Setting ${FLG} ${IP_SEGMENT}${i}
    else
      Linux_Net_Setting ${FLG} ${IP_SEGMENT}${i}
    fi
  done

  if [ ${ARCH} = "Darwin" ]; then
    ifconfig
  else
    ip addr show lo
  fi
}

main
