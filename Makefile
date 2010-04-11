#
#	Top level master make to build all packages
#
PACKAGES	:= matrixssl openssl php

all: 
	@for p in $(PACKAGES) ; do \
		echo Building $$p ; \
		make -C $$p ; \
	done

clean:
	for p in $(PACKAGES) ; do make -C $$p clean ; done