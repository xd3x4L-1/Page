<h1>Index Controller</h1>
<p>Welcome to Trial index controller.</p>

<p>
Page finns på Github och om du klickar på Download ZIP så laddar du ned Page och får en katalog /page-master/page/trial.
</p>

<h3>Installation</h3>

<p>
För att installera Page lägger du katalogen /page-master/page/trial på en vald plats i din dator och öppnar filen .htaccess i katalog /trial och katalogen /page-master/page/trial/site/data gör du skrivbar. I filen .htaccess skall värdet för RewriteBase vara lika den lokala adressen till katalogen /trial.
<br><br>
chmod 777: /page-master/page/trial/site/data 
<br><br>
Om man nu klickar på länken module/install ges en bekräftelse om att olika tabeller har införts och att en administratör root:root och en användare doe:doe har lagts till databasen.

Om vi tar bort variabeln $Origo->config['start'] i filen /page-master/page/trial/site/config går detta inte att göra om.
<br><br>
 /* $Origo->config['start'] = 'false'; */ 
<br><br>
Det är nu tillfälle att ändra lösenordet för adminstratören root och det gör du genoma att logga in vid det röda äpplet med namn root och lösen root. Då visas ett formulär och om du skriver ett nytt lösenord och klickar på Change password så uppdaterar du lösenordet. Om du vill hindra administratören att göra om tabellerna så ändrar du variabeln $Origo->config['installed'].
<br><br>
 $Origo->config['installed'] = 'true'; 
<br><br>
Om värdet är 'false' kan tabellerna installeras om och om värdet är 'true' kan de inte installeras om.



<a href='<?=create_url('module/install')?>'>module/install</a>


