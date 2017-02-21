test:
	phpunit
	
clean:
	rm -rf output

package: clean test
	mkdir output output/ari
	zip -r output/ari_tmp.zip languages lib css js partials *.php
	cd output/ari; \
		unzip ../ari_tmp.zip
	cd output; \
		rm -f ari_tmp.zip;\
		zip -r ari.zip ari
	rm -rf output/ari
