#1435945978
ls -la
#1435946047
cd public_
#1435946048
ls -l
#1435946051
cd public_
#1435946054
cd /var/www
#1435946054
ls -l
#1435946057
cd www/
#1435946057
ls -l
#1435946063
cd files/
#1435946064
ls -la
#1435946066
cd ..
#1435946074
ls -la
#1435946074
cd ..
#1435946075
ls -la
#1435946081
cd envoynet/
#1435946082
ls -la
#1435946210
cd ..
#1435946211
ls -l
#1435946219
git init
#1435946568
yum
#1435946584
sudo yum install git
#1435946614
su
#1435946716
yum install git --disableexcludes=main --skip-broken
#1435946734
cd ~
#1435946737
wget http://git-core.googlecode.com/files/git-1.7.9.2.tar.gz
#1435946741
tar zxvf git-1.7.9.2.tar.gz
#1435946744
cd git-1.7.9.2
#1435946747
./configure --prefix=/home/$USER
#1435946751
make
#1435946931
make install
#1435946935
echo 'PATH=$PATH:$HOME/bin' >> $HOME/.bashrc
#1435946939
source $HOME/.bashrc
#1435946945
git
#1435946947
cd ..
#1435946948
ls -la
#1435946952
git init
#1435946970
touch .gitignore
#1435946998
nano .gitignore 
#1435947134
git add -A
#1435947152
git commit -m "first commit"
#1435947162
git config --global user.email "jacob@subsumo.com"
#1435947170
 git config --global user.name "Jacob Friedman"
#1435947174
git config --global user.email "jacob@subsumo.com"
#1435947275
git remote add origin https://github.com/subsumo/envoy.website.git
#1435947280
git push -u origin master
#1435947305
git push
#1435947355
git remote -v
#1435947365
git push
#1435947386
yum install curl-devel
#1435947491
git remote add origin git@github.com:subsumo/envoy.website.git
#1435947497
git remote remove origin
#1435947502
git remote rm origin
#1435947506
git remote add origin git@github.com:subsumo/envoy.website.git
#1435947509
git push
#1435947590
ls al ~/.ssh
#1435947608
pbcopy < ~/.ssh/id_rsa.pub
#1435947625
nano id_rs
#1435947628
nano id_rsa.pub
#1435947631
ls -la
#1435947634
cd ~/.ssh
#1435947636
ls -la
#1435947640
nano id_rsa.pub
#1435947664
vi id_rsa.pub
#1435947686
git push
#1435947699
git branch
#1435947703
git branch master
#1435947708
git branch -v
#1435947713
git branch add master
#1435947729
git checkout master
#1435947735
git branch master
#1435947748
git remote -v
#1435947763
git branch
#1435947766
cd ..
#1435947766
ls -la
#1435947767
git branch
#1435947770
git branch add master
#1435947773
git checkout master
#1435947803
git checkout -b master
#1435947804
ls -la
#1435947805
git branch
#1435947810
git push
#1435947830
git checkout -t -b master origin/master
#1435947836
git branch
#1435947838
git checkout
#1435947840
git checkout master
#1435947842
git
#1435947846
git branch
#1435947847
git branch list
#1435947849
git branch -v
#1435947863
git update-ref HEAD master
#1435947874
git checkout -t -b master origin/master
#1435947888
git remote show origin
#1435947941
git checkout
#1435947959
git push origin/master
#1435947962
git push origin
#1435947996
git push -f
#1435948019
git push -u origin/master
#1435948023
git push -u origin master
#1435948063
git remote add origin git@github.com:subsumo/envoy.website.git
#1435948067
git push -u origin master
#1435948094
git commit -m 'initial commit'
#1435948112
git add -A
#1435948120
git add ./
#1435948131
git commit -m "envoy commit #1"
#1435948147
git push -u origin master
#1435948157
git branch
#1435948161
git checkout master
#1435948168
git checkout -b master
#1435948171
git push -u origin master
#1435948573
ls -la
#1435948580
cd public_
#1435948605
cd public_html/
#1435948609
ls -la
#1435948638
touch deploy.php
#1435948644
nano deploy.php
#1435948678
cd ...
#1435948680
cd ..
#1435948687
cd users
#1435948689
ls -la
#1435948691
ls -l
#1435948693
cd ~
#1435948699
cd public_html
#1435948715
nano deploy.php
#1435948889
ls -la
#1435948899
nano .htaccess
#1435948944
git add --all
#1435948950
git commit -m 'add deploy'
#1435948953
git push
#1435948976
nano .htaccess
#1435949126
mkdir deploy
#1435949133
mv deploy.php deploy/index.php
#1435949158
ls la
#1435949160
cd ..
#1435949161
ls -la
#1435949166
cd public_html/
#1435949167
ls -la
#1435949173
nano .htaccess 
#1435949378
mv .htaccess .htaccess_old
#1435949381
touch .htaccess
#1435949385
nano .htaccess
#1435949499
ls -lsa
#1435949500
ls -la
#1435949505
rm .htaccess
#1435949506
ls -la
#1435949969
mv .htaccess_old .htaccess
#1435950029
mv deploy ../
#1435950041
mv deploy ../deploy
#1435950043
dc ..
#1435950044
cd ..
#1435950044
ls -l
#1435950048
cd deply
#1435950050
cd deploy
#1435950051
ls -l
#1435950057
mv deploy/index.php ./
#1435950060
rm deploy/
#1435950064
rm -r deploy/
#1435950103
nano index.php 
#1435950112
cd ..
#1435950113
ls -la
#1435950124
la -la
#1435950125
ls -la
#1435950130
cd deploy/
#1435950132
ls -la
#1435950198
mv index.php ../git/
#1435950210
ls -la
#1435950213
cd ..
#1435950215
ls -l
#1435950226
mv git/index.php deploy/index.php
#1435950229
rm -rf git
#1435950250
ls -l
#1435950257
cd deploy/
#1435950258
ls -la
#1435950263
chmod 755 index.php 
#1435950291
touch index.html
#1435950297
nano index.html
#1435950325
ls -la
#1435950351
cd ..
#1435950352
ls -la
#1436020711
exit
#1436020737
ls -l
#1436020738
cd public_
#1436020741
cd public_html
#1436020742
la -l
#1436020743
ls -l
#1436020752
cd ..
#1436020753
ls -l
#1436020757
cd deploy/
#1436020760
ls -l
#1436020771
rm index.html
#1436020893
cd ..
#1436020893
ls -l
#1436020904
rm git-1.7.9.2.tar.gz
#1436020906
cd public_
#1436020909
cd public_html
#1436020910
git
#1436020914
git status
#1436020931
git pull
#1436023125
git status
#1436023146
cd ..
#1436023147
ls -l
#1436023148
cd deploy/
#1436023150
ls -l
#1436023151
cd index.php 
#1436023154
nano index.php 
#1436023157
sudo nano index.php 
#1436023169
nano index.php 
#1436023250
git
#1436023252
git status
#1436023272
ls -l
#1436023277
nano index.php 
#1436023371
cd ..
#1436023373
ls -l
#1436023378
git status
#1436023385
cd deploy/
#1436023388
nano index.php
#1436023395
cd ..
#1436023396
git reset --hard HEAD && git pull origin master
#1436140687
ls -l
#1436140700
git git pull
#1436140702
git pull
#1436142120
ls -l
#1436142129
cd share/
#1436142129
ls -l
#1436142132
cd ..
#1436142132
ls -l
#1436142673
git pull
#1436142876
ssh-agent
#1436142901
ssh -T git@github.com
#1436142920
nano ~/.ssh/config
#1436142924
touch ~/.ssh/config
#1436142926
nano ~/.ssh/config
#1436142965
ssh -T git@github.com
#1436142977
chmod 775 /home/twtestsite/.ssh/config
#1436142980
ssh -T git@github.com
#1436142993
cd ~/.ssh
#1436142995
ls -l
#1436143009
cecho "$SSH_AUTH_SOCK"
#1436143010
echo "$SSH_AUTH_SOCK"
#1436143017
ssh -T git@github.com
#1436143033
chmod 0600 config
#1436143034
ssh -T git@github.com
#1436143048
echo "$SSH_AUTH_SOCK"
#1436143073
 echo "$SSH_AUTH_SOCK"
#1436143080
ssh-add -L
#1436143159
man ssh-agent
#1436143196
nano ~/.bash_profile
#1436143223
quit
#1436143225
exit
#1436143250
ls -l
#1436143252
git pull
#1436144921
git push
#1436144924
git pull
#1436206319
git push
#1436206321
git pull
#1436214254
git push
#1436214256
git pull
#1436272814
it pull
#1436272816
git pull
#1436279726
git puhll
#1436279728
git pull
#1436368915
ls -l
#1436368920
cd envoynet/
#1436368921
ls -l
#1436368922
cd src/
#1436368923
ls -l
#1436368925
cd Con
#1436368930
cd Controller
#1436368931
ls -l
#1436369051
cd ..
#1436369052
ls -l
#1436369057
cd ...
#1436369058
cd ..
#1436369059
git pull
#1436424611
gitgit pull
#1436424614
git pull
#1436449336
pull
#1436449338
git pull
#1436451813
cd ..
#1436451814
git pull
#1436452251
cd ..
#1436452255
ls -l
#1436452257
cd home
#1436452259
git pull
#1436452262
ls -l
#1436460132
git reset --hard origin/master
#1436460794
git pull
#1436469049
git pul
#1436469051
git pull
#1436471871
git pul
#1436471873
git pull
#1436535305
ls -l
#1436535627
git pull
#1436537432
git reset --hard origin/master
#1436537434
git pull
#1436539223
git reset --hard 46d8e5b 
#1436539274
git reset --hard 906515f
#1436539562
git pull
#1436540292
git pull 6c2712ce5b
#1436540299
git reset --hard 6c2712ce5b
#1436540302
git pull
#1436540463
git pull --force
#1436540484
git reset --hard origin/master
#1436540521
git pull
#1436541026
git reset --har1874285
#1436541036
git reset --hard 1874285
#1436541187
git pull
#1436546312
git pull --heard
#1436546317
git pull --hard
#1436546341
git reset --hard origin/master
#1436546398
git pull
#1436551930
git reset --hard ab840ab
#1436552111
git reset --hard 87ca6d0
#1436552296
git reset --hard https://github.com/subsumo/envoy.website/commit/8f80a5edaa75956a28cd70440c5dc720cb464e0
#1436552311
git reset --hard f793a03
#1436552376
git reset --hard a34cda7
#1436552444
git reset --hard b552988
#1436552489
git reset --hard 8fac082
#1436552569
git reset --hard 822abb8
#1436552628
git reset --hard 3f72037
#1436552669
git reset --hard 64fb55e
#1436552707
git reset --hard 822abb8
#1436552767
git reset --hard 0113856
#1436552834
git reset --hard 64fb55e
#1436552893
git reset --hard f65a3d2
#1436553121
git reset --hard https://github.com/subsumo/envoy.website/commit/fed1f98de5c59f6e4ea10e624c2f1b888c7289a7
#1436553134
git reset --hard fed1f98
#1436553270
git reset --hard 3cc7943
#1436553319
git reset --hard 3576ea0
#1436553388
git reset --hard ab840ab
#1436553452
git reset --hard f65a3d2
#1436553471
git reset --hard e017e5b
#1436553507
git reset --hard ab840ab
#1436553613
git reset --hard 2df5e91133
#1436553705
git pull
#1436553992
git reset --hard e017e5b
#1436553997
git reset --hard f65a3d2
#1436554165
git reset --hard ab840ab
#1436554264
git reset --hard latest commit 9967a29472
#1436554272
git reset --hard 9967a29472
#1436554308
git reset --hard 2df5e91
#1436554911
git reset --hard ab840ab
#1436555343
git reset --hard 2df5e91
#1436555374
git reset --hard ab840ab
#1436555388
git reset --hard e017e5b
#1436555532
git reset --hard 9967a29472
#1436555648
git reset --hard e017e5b
#1436555665
git reset --hard 9967a29472
#1436555737
 git reset --hard 2df5e91
#1436556102
git pull
#1436556113
git reset --hard de39526
#1436556177
git reset --hard 2df5e91
#1436556252
git pull
#1436556287
git reset --hard ab840ab
#1436556347
git pull
#1436556387
git reset --hard de39526
#1436556396
git reset --hard 9967a29472
#1436556440
git reset --hard 9967a29
#1436556453
git reset --hard 23b3335
#1436556615
git reset --hard 2df5e91
#1436556618
git reset --hard de39526
#1436556623
git reset --hard ab840ab
#1436556658
git reset --hard de39526
#1436556770
git reset --hard ab840ab
#1436556840
git reset --hard e017e5b
#1436557077
git reset --hard de39526
#1436557158
git reset --hard bc70b5d0c2
#1436557560
git reset --hard ab840ab
#1436557593
git reset --hard bc70b5d0c2
#1436557738
git reset --hard ab840ab
#1436557827
git reset --hard bc70b5d0c2
#1436559113
git pull 23b3335
#1436559117
git pull
#1436559121
git reset --hard 23b3335
#1436559154
git pull
#1436559319
git reset --hard 5da53c0
#1436559366
git pull
#1436559423
git reset --hard ab840ab
#1436559425
git reset --hard 5da53c0
#1436559428
git reset --hard ab840ab
#1436559514
git pull --force
#1436559790
git pull
#1436559857
git reset --hard 7b27509
#1436560260
git reset --hard ab840ab
#1436560274
git reset --hard 7b27509
#1436560738
git pull
#1436560760
git reset --hard 3b19753
#1436561261
git reset --hard 7b27509
#1436562384
git pull
#1436562389
git pull -force
#1436562391
git pull --force
#1436562421
git reset --hard 1ae28b1
#1436562436
git pull
#1436562440
git pull -force
#1436562442
git pull --force
#1436562468
git reset --hard 1ae28b1
#1436562598
git pull
#1436755972
lls -l
#1436755973
ls -l
#1436755975
git pull
#1436756005
git pull --force
#1436756031
git reset --hard 07fcf83770
#1436757215
git pull
#1436803363
ls -l
#1436803365
cd public_
#1436803370
git pull
#1436803380
git pull --force
#1436803386
git reset --hard aa44ddd
#1436803389
git pull
#1436806943
git reset --hard HEAD
#1436806945
git pull
#1436970591
ls -l
#1436969271
git reset --hard HEAD
#1436969274
git pull
#1436969345
git reset --hard HEAD
#1436969347
git pull
#1436969382
git reset --hard origin/master
#1436969385
git pull
#1436972224
ls -l
#1436972232
git pull
#1436973722
git reset --hard HEAD
#1436973724
git pull
#1436973884
ls -l
#1436973887
cd envoynet/
#1436973888
ls -l
#1436973894
cd src
#1436973894
ls -l
#1436973896
cd Locale/
#1436973896
ls -l
#1436973904
rm .DS_Store
#1436973907
git push
#1436973910
cd fr_CA/
#1436973911
ls -l
#1436973918
nano default.po
#1436973968
cd ..
#1436973971
ls -l
#1436973973
cd tmp/
#1436973974
ls -l
#1436973987
rm sess_
#1436973991
rm sess_2b3p1ka0jj94aauit501t3omd3rehpp7 
#1436973994
rm sess_3
#1436973997
rm sess_374l2rl3jcchlmjsqqtsf8orqvufvblp 
#1436973999
rm sess_9vfej82405bmstv2imv60co1ejg409uk 
#1436974003
rm sess_b5abrbtoh3bu6do5vpr9fqrf4msc5ndt 
#1436974006
rm sess_bb5e89li41poohl00vm18147or9q3s4q 
#1436974014
rm sess_bf3i666p1ktjqqgene80t8e6b4p0uhag 
#1436974017
rm sess_dgvhu5gfntkp0er7p0vbn0gbeqvghghv 
#1436974020
rm sess_g8hkass6et6on04o0lo8mdninvb0mgsa 
#1436974022
rm sess_gs688oh4mojckfh04oo4td5a9mb5f741 
#1436974025
rm sess_l9ah635vt2dq83ek223umka0ghanisbc 
#1436974027
rm sess_lep3v0726775dtiglg63fmg72ksgjkga 
#1436974031
rm sess_lme6lbi797l9bb00jujk70p6nl0jdbm1 
#1436974035
rm sess_npqqhtb6n415kh8ligi7jk2bnp20tc58 
#1436974038
rm sess_tl6ug4bllorr8s877bt1crrfo1mii00l 
#1436974040
rm sess_vqjv3da6u7ersi7tg1a4i4etrjh5k764 
#1436974279
cd ..
#1436974279
ls -l
#1436974281
cd tmp/
#1436974282
ls -l
#1436974288
cd ..
#1436974289
ls -l
#1436974386
git pull
#1437064339
git pullgit pull
#1437064407
git pull
#1437420357
ls -l
#1437420360
cd public_
#1437420360
ls -l
#1437420361
cd www
#1437420362
ls -l
#1437420366
cd ..
#1437420368
ls -l
#1437420370
cd public_html
#1437420371
ls -l
#1437420377
cd src/
#1437420378
ls -l
#1437420380
cd ..
#1437420380
ls -l
#1437420386
touch git-hook.php
#1437420392
sudo nano git-hook.php
#1437420399
nano git-hook.php
#1437420426
ls -l
#1437420430
cd ..
#1437420445
pwd
#1437420499
cd public_html
#1437420499
ls -l
#1437420523
nano git-hook.php
#1437420641
cd..
#1437420643
cd ..
#1437420646
ls -l
#1437420699
cd deploy
#1437420701
ls -l;
#1437420708
nano index.php
#1437420968
ls -l
#1437420969
cd ..
#1437420971
git status
#1437420983
git
#1437420989
git log
#1437421920
ls -l
#1437421924
cd public_
#1437421927
cd public_html
#1437421929
ls -l
#1437421980
cd ..
#1437421981
ls -l
#1437421982
cd deploy/
#1437421983
ls -l
#1437421987
cd index.php 
#1437421995
nano deploy.log
#1437422003
nano index.php
#1437422078
cd home/twtestsite && git reset --hard HEAD
#1437422091
cd home && git reset --hard HEAD
#1437422093
ls -l
#1437422094
cd ..
#1437422096
ls -l
#1437422097
pwd
#1437422101
cd /home/twtestsite
#1437422104
cd home/twtestsite
#1437422107
cd deploy/
#1437422111
nano git
#1437422113
ls -l
#1437422116
nano index.php 
#1437422167
cd /home/twtestsite && git reset --hard HEAD
#1437422180
cd /home/twtestsite && git pull
#1437422280
ls -l
#1437422282
cd deploy/l
#1437422284
cd deploy/
#1437422285
ls -l
#1437422288
nano deploy.log 
#1437422297
nano index.php 
#1437422690
git
#1437422737
touch index2.php
#1437422745
sudo index.php
#1437422750
nano index.php
#1437422768
nano index2.php
#1437422839
chmod index2.php 775
#1437422844
chmod 775 index2.php
#1437422854
chmod 777 index2.php
#1437422869
ls -l
#1437422901
chmod 755 index2.php
#1437422959
rm index2.php
#1437422963
cd ..
#1437422965
ls -l
#1437422967
git pull
#1437423097
quit
#1437584990
ls -lk
#1437584992
ls -l
#1437585093
git pull
#1437585106
git reset --hard head
#1437585113
git reset --hard HEAD
#1437585114
git pull
#1437585150
ls -l
#1437585444
git pull
#1437597138
git pullo
#1437597140
git pull
#1438005557
ls -l
#1438019107
git pull
#1438013114
git reset --hard HEAD
#1438013116
git pull
#1438013121
git reset --hard HEAD
#1438013122
git pull
#1438013139
git reset --hard HEAD
#1438013140
git pull
#1438014156
git reset --hard HEAD
#1438014157
git pull
#1438550212
git add --all
#1438550226
ls -l
#1438550246
nano .gitignore
#1438550254
cd ..
#1438550255
ls -l
#1438550257
cd ho
#1438550259
ls -l
#1438550261
quit
#1438550262
exit
