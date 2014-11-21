#!/bin/bash

# Prevent strace from abbreviating arguments?
# You want the -s strsize option, which specifies the maximum length of a string to display (the default is 32).



# -etrace=!open means to trace every system call except open. In addition, the special values all and none have the obvious meanings.
#-etrace=!open
#-e trace=!write.

# -s strsize
# Specify the maximum string size to print (the default is 32). Note that 
# filenames are not considered strings and are always printed in full.

rm -rf trc/*.trc
 
#this check doesn't work, as the script gives a compile error before it's run.
if [[ ! $BASH ]]
then
  echo "This script needs to run in bash, not sh."
  exit -1
fi
 
additional_strace_args="$1"

mkdir trc
 
MASTER_PID=$(ps auwx | grep php-fpm | grep -v grep | grep 'master process'  | cut -d ' ' -f 7)

# ls -l /tmp/foobar | awk '{print $1"\t"$9}'
# This code takes some input, such as this:
# -rw-rw-rw-   1 root     root            1 Jul 14  1997 tmpmsg
# and generates output like this:
# -rw-rw-rw-      tmpmsg


summarise=""

#comment in to show total of calls
#summarise="-c"


nohup strace -r $summarise -p $MASTER_PID -ff -o ./trc/master.follow.trc >"trc/master.$MASTER_PID.trc" 2>&1 &
 
while read -r pid;
do
	if [[ $pid != $MASTER_PID ]]; then

	    #shows individual calls
            #nohup strace -r -p "$pid" $additional_strace_args >"trc/$pid.trc" 2>&1 &

		#shows total of calls
		nohup strace -r $summarise -p "$pid" $additional_strace_args >"trc/$pid.summary.trc" 2>&1 &
	fi
done < <(pgrep php-fpm)

#This needs bash not SH

read -p "Strace running - press [Enter] to stop"

pkill strace


