<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */

    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_FAQ);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_FAQ));
    
    require('header_main.php');
?>

<!--- This_File --->
                                            <tr>
                                                <td class="main">
                                                <div class="grey"><big><big><big>Assistance
                                                commerciale.</big></big></big><br>
                                                </div>
                                                <br>
                                                <a href="faq.php#Qui_sommes_nous_"><span
                                                style="font-weight: bold;">Qui sommes nous ?</span></a><br>
                                                <a href="faq.php#Quelle_est_le_prix_de_livraison_pour_un"><span
                                                style="font-weight: bold;">Quelle est le prix de
                                                livraison pour un envoi � l'international ?</span></a><br>
                                                <a href="faq.php#Sous_combien_de_temps_ma_commande"><span
                                                style="font-weight: bold;">Sous combien de
                                                temps ma
                                                commande est-elle exp�di�e ?</span></a><br>
                                                <a href="faq.php#Quel_sont_le_mode_et_le_d%E9lai_de"><span
                                                style="font-weight: bold;">Quel sont le
                                                mode et le d�lai de livraison ?</span></a><br>
                                                <a href="faq.php#Puis_je_suivre_lexp%E9dition_de_ma"><span
                                                style="font-weight: bold;">Puis-je suivre
                                                l'exp�dition de ma commande ?</span></a><br>
                                                <a href="faq.php#Puis-je_payer"><span
                                                style="font-weight: bold;">Puis-je payer par
                                                virement bancaire ou par western union ?</span></a><br>
                                                <a href="faq.php#Puis-je_annuler"><span
                                                style="font-weight: bold;">Puis-je annuler ma
                                                commande ?</span></a><br>
                                                <a href="faq.php#Puis-je_avoir_une_facture"><span
                                                style="font-weight: bold;">Puis-je avoir une facture
                                                ?</span></a><br>
                                                <a href="faq.php#TVA"><span style="font-weight: bold;">Pourrai-je
                                                r�cup�rer
                                                la&nbsp;TVA ?</span></a><br>
                                                <a href="faq.php#prix"><span style="font-weight: bold;">Faites
                                                vous
                                                des&nbsp;prix sp�cifiques pour les associations, les entreprises,
                                                les �coles....</span></a><br>
                                                <a href="faq.php#Acceptez_vous_les_retours"><span
                                                style="font-weight: bold;">Acceptez vous les retours
                                                ?</span></a><br>
                                                <a href="faq.php#ne_fonctionne_pas"><span
                                                style="font-weight: bold;">Si mon
                                                produit&nbsp;ne fonctionne pas, que faire ?</span></a><br>
                                                <a href="faq.php#Explications_"><span
                                                style="font-weight: bold;">Ou trouvez les explications d'utilisation de vos CDs ?</span></a><br>
                                                <a href="faq.php#Comment_vous_contacterExplications_"><span
                                                style="font-weight: bold;">Comment vous contacter ?</span></a><br>
                                                <br>
                                                <div class="grey"><big><big><big>Assistance
                                                technique.<br>
                                                </big></big></big></div>
                                                <br>
                                                <a href="faq.php#Je_ne_sais_pas_comment_utiliser_le"><span
                                                style="font-weight: bold;">Je ne sais pas comment
                                                utiliser
                                                le logiciel ?</span></a><br>
                                                <span style="font-weight: bold;">Qu'est ce que la page
                                                d'accueil ?</span><br>
                                                <a href="faq.php#Jutilise_Vista"><span
                                                style="font-weight: bold;">J'utilise Vista, vos
                                                produits sont ils compatibles ?</span></a><br>
                                                <a href="faq.php#Jutilise_un_Mac"><span
                                                style="font-weight: bold;">J'utilise un Mac ou une
                                                distribution Linux, vos
                                                produits sont ils compatibles ?</span></a><br>
                                                <a href="faq.php#Jai_ins%E9r%E9_mon_CD"><span
                                                style="font-weight: bold;">J'ai ins�r� mon CD, il ne
                                                se passe rien ?</span></a><br>
                                                <a href="faq.php#Mon_antivirus"><span
                                                style="font-weight: bold;">Mon antivirus bloque
                                                l'ouverture du CD,&nbsp; qui pourtant fonctionnait tr�s bien avant,
                                                que faire?</span></a><br>
                                                <a href="faq.php#Jai_cliqu%E9_sur_lic%F4ne_de_limprimante"><span
                                                style="font-weight: bold;">J'ai cliqu� sur l'ic�ne
                                                de l'imprimante pour visualiser et imprimer les pi�ces de mon patron,
                                                mais&nbsp;l'impression ne se lance pas?</span></a><br>
                                                <a href="faq.php#Faut-il_beaucoup_de_feuille"><span
                                                style="font-weight: bold;">Faut-il beaucoup de
                                                feuilles ?</span></a><br>
                                                <a href="faq.php#Puis-je_adapter_mon_patron"><span
                                                style="font-weight: bold;">Puis adapter mon patron
                                                en fonction de mes mensurations devant et dos ?</span></a><br>
                                                <a href="faq.php#Puis-je_adapter_mon_patron"><span
                                                style="font-weight: bold;">Puis-je adapter mon
                                                patron en fonction d'autre mensurations telles que&nbsp; ma hauteur
                                                de taille, ou de ma hauteur de&nbsp;jambe?</span></a><br>
                                                <a href="faq.php#Puis_je_r%E9duire_mon_patron"><span
                                                style="font-weight: bold;">Puis je r�duire mon
                                                patron ?</span></a><br>
                                                <a href="faq.php#Jai_acc%E9_"><span style="font-weight: bold;">J'ai
                                                acc� � un
                                                mannequin virtuel, � quoi sert -il ?</span></a><br>
                                                <a href="faq.php#Est_il_normal_davoir_sur_le_CD_pantalon"><span
                                                style="font-weight: bold;">Est il normal d'avoir sur
                                                le CD pantalon � rentrer le tour de poitrine?</span></a><br>
                                                <a href="faq.php#Pourquoi_un_CD_XXL"><span
                                                style="font-weight: bold;">Pourquoi un CD XXL si les
                                                mensurations possibles sont identiques aux autres Cds ?</span></a><br>
                                                <a href="faq.php#Si_jai_un_probl%E8me"><span
                                                style="font-weight: bold;">Si j'ai un probl�me dans
                                                la r�alisation du patron, puis je �tre aid�e ?</span></a><br>
                                                <a href="faq.php#Pourrais_je_avoir_des_instructions_de"><span
                                                style="font-weight: bold;">Pourrais je avoir des
                                                instructions de montage ?</span></a><br>
                                                <br>
                                                <div class="grey"><a
                                                name="Burn"></a><big><big><big>Assistance
                                                pour la gravure de nos fichiers ISO t�l�charg�s.<br>
                                                </big></big></big></div>
                                                <br>
                                                <a href="faq.php#Fichier"><span style="font-weight: bold;">Ou trouver mon fichier � t�l�charger?</span></a><br>
                                                <a href="faq.php#Logiciel"><span style="font-weight: bold;">Je n'ai pas de logiciel pour graver une image iso/le fichier t�l�charg�.</span></a><br>
                                                <a href="faq.php#USB"><span style="font-weight: bold;">Puis-je installer le programme sur un clef USB?</span></a><br>
                                                <a href="faq.php#HD"><span style="font-weight: bold;">Puis-je installer le programme sur un mon disque dur?</span></a><br>
                                                <a href="faq.php#printer"><span style="font-weight: bold;">Je n'arrive pas � imprimer le patron.</span></a><br>
                                                <a href="faq.php#Menu"><span style="font-weight: bold;">Je n'ai pas l'option menu lorsque je s�lectionne un patron dans le logiciel.</span></a><br>
                                                <a href="faq.php#Copy"><span style="font-weight: bold;">Puis-je faire autant de CDs que je le d�sire?</span></a><br>
                                                
                                                
                                                <br>
                                                <div class="grey"><big><big><big>Assistance
                                                commerciale.</big></big></big><br>
                                                </div>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Qui_sommes_nous_"></a>Qui sommes nous ?</span><br>
                                                Nous sommes commer�ant, licensi� de la technologie
                                                Leko, dont la maison m�re se trouve en Russie, et d�tentrice de la
                                                marque �&nbsp;Lekala&nbsp;�<br>
                                                <span style="font-weight: bold;"><br>
                                                <a name="Quelle_est_le_prix_de_livraison_pour_un"></a>Quelle
                                                est le prix de livraison pour un envoi � l'international ?</span><br>
                                                Coudresurmesure
                                                applique un forfait identique pour toutes commandes quel que soit la
                                                destination et quel que soit le nombre d'articles. Ce forfait est de 2 �<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Sous_combien_de_temps_ma_commande"></a>Sous
                                                combien de temps ma commande est-elle exp�di�e ?</span><br>
                                                Toutes nos
                                                commandes sont exp�di�es sous 48 heures ouvrables. Un mail de
                                                confirmation vous sera envoy�
                                                indiquant le nouveau statut de votre commande.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Quel_sont_le_mode_et_le_d�lai_de"></a>Quel sont
                                                le mode et le d�lai de livraison ?</span><br>
                                                Nos commandes sont
                                                envoy�es sous enveloppe � bulles, en tarifs lettre. En France, le d�lai
                                                d'acheminement moyen est de 48h, de l'exp�dition � la r�ception. Nous
                                                ne proposons pas de colissimo afin de garder un forfait de livraison le
                                                plus �conomique possible pour nos clients.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Puis_je_suivre_lexp�dition_de_ma"></a>Puis-je
                                                suivre l'exp�dition de ma commande ?</span><br>
                                                Le
                                                mode de livraison ne permet pas d'avoir un suivi des services de la
                                                poste. Toutefois, si vous n'avez pas re�u votre commande dans un d�lais
                                                de 5 jours ouvr�s suivant le nouveau statut de votre commande
                                                �&nbsp;livr�&nbsp;�, merci de nous en tenir inform�.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a name="Puis-je_payer"></a>Puis-je
                                                payer par virement bancaire ou par western union ?</span><br>
                                                a) Pour tout paiement par virement bancaire, choisir le mode de
                                                r�glement par �&nbsp;ch�que&nbsp;�, et nous informer par un
                                                petit commentaire de votre virement.<br>
                                                Voici nos coordonn�es bancaires :<br>
                                                Mr JOURDAN<br>
                                                <br>
                                                IBAN : FR76 1348 5008 0008 9105 6661 109<br>
                                                BIC : CEPAFRPP348<br>
                                                <br>
                                                Code �tablissement : 13485<br>
                                                Code guichet: 00800<br>
                                                Num�ro de compte : 08910566611<br>
                                                Cl� rib : 09<br>
                                                Agence : 00072<br>
                                                <br>
                                                b) Pour tout paiement par Western union, choisir le mode de r�glement
                                                par �&nbsp;ch�que&nbsp;�, et nous informer par un petit
                                                commentaire de votre paiement.<br>
                                                Notre si�ge social : L. JOURDAN, 36 Lotissement les Muriers, 30340
                                                ROUSSON<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Puis-je_annuler"></a>Puis-je annuler ma commande
                                                ?</span><br>
                                                Par un simple email (<a href="mailto:info@coudresurmesure.fr">info@coudresurmesure.fr</a>),
                                                nous annulerons votre commande. Si vous avez d�j� r�gl� via paypal,
                                                nous proc�derons au remboursement via paypal.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Puis-je_avoir_une_facture"></a>Puis-je avoir une
                                                facture ?</span><br>
                                                Chaque colis est accompagn� de sa facture.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a name="TVA"></a></span><span
                                                style="font-weight: bold;">Pourrai-je r�cup�rer la&nbsp;TVA
                                                ?</span><br>
                                                Notre r�gime fiscal nous dispense de l'application de la TVA.<br>
                                                TVA. non applicable, art. 293 B du CGI.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a name="prix"></a></span><span
                                                style="font-weight: bold;">Faites vous des&nbsp;prix
                                                sp�cifiques pour les
                                                associations, les entreprises, les �coles....</span><br>
                                                A partir de 10 articles, nous vous proposerons un tarif sp�cial : le
                                                produit � 9�90, + 5� de frais de port (envoi en colissimo).<br>
                                                Merci de nous contacter.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Acceptez_vous_les_retours"></a>Acceptez vous les
                                                retours ?</span><br>
                                                Nous n'acceptons aucun retour afin d'�viter toutes fraudes, mais nous
                                                nous engageons � ce que le produit fonctionne selon le descriptif de
                                                l'annonce.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="ne_fonctionne_pas"></a></span><span
                                                style="font-weight: bold;">Si mon produit&nbsp;ne
                                                fonctionne pas, que
                                                faire ?</span><br>
                                                En cas de mauvais fonctionnement de nos logiciels, indiquez nous par un
                                                email la raison en nous donnant :<br>
                                                1. Le message qui appara�t sur votre ordinateur<br>
                                                2. La configuration que vous utilisez (Windows Xp, Vista...etc)<br>
                                                3. Le nom de votre antivirus<br>
                                                <br>
                                                Apr�s une prise de contact avec notre technicien, si le probl�me n'est
                                                pas r�solu, nous vous renverrons rapidement un nouveau produit.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Explications_"></a>Ou trouvez les explications d'utilisation de vos CDs ?</span><br>
                                                <a target="_blank" href="/shop/_includes/explications.pdf">Cliquez ici pour la notice d'utilisation de nos CDs.</a></b></i><br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Comment_vous_contacter_"></a>Comment vous
                                                contacter ?</span><br>
                                                Par email : <a href="mailto:info@coudresurmesure.fr">info@coudresurmesure.fr</a>.
                                                Notre conseill�re vous r�pond sous 48h ouvrables. Ou en <a
                                                href="contact_us.php">cliquant ici</a>.<br>
                                                Nous n'assurons pas de standard t�l�phonique. Au besoin, nous vous
                                                recontacterons nous-m�me.<br>
                                                <br>
                                                <div class="grey"><big><big><big><big>Assistance
                                                technique.<br>
                                                </big></big></big></big></div>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Je_ne_sais_pas_comment_utiliser_le"></a>Je ne
                                                sais pas comment
                                                utiliser le logiciel ?</span><br>
                                                Avant toutes utilisation de notre logiciel, nous vous prions d'imprimer
                                                la notice d'utilisation. Vous la trouverez tr�s facilement en cliquant
                                                sur l'ic�ne �&nbsp;point d'interrogation vert&nbsp;� en page
                                                d'accueil en haut � droite du logiciel ou <a
                                                href="includes/content/explications.pdf">en cliquant ici</a>.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Quest_ce_que_la_page"></a>Qu'est ce que la page
                                                d'accueil ?</span><br>
                                                C'est la premi�re image qui appara�t lorsque le logiciel se met en
                                                route.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Jutilise_Vista"></a>J'utilise Vista, vos
                                                produits sont ils compatibles ?</span><br>
                                                Oui.<br>
                                                <br style="font-weight: bold;">
                                                <span style="font-weight: bold;"><a
                                                name="Jutilise_un_Mac"></a>J'utilise un Mac ou une
                                                distribution Linux, vos
                                                produits sont ils compatibles ?</span><br>
                                                Non.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Jai_ins�r�_mon_CD"></a>J'ai ins�r� mon CD, il ne
                                                se passe rien ?</span><br>
                                                Si le lancement automatique de notre cd ne s'effectue pas d�marrez
                                                manuellement notre programme :<br>
                                                - Rendez vous sur votre lecteur de disque, et faite un clique droit :
                                                �&nbsp;ouvrir&nbsp;�,<br>
                                                - Ouvrir le fichier �&nbsp;leko&nbsp;� ou
                                                �&nbsp;leko.exe&nbsp;� selon votre configuaration,<br>
                                                - Le logiciel d�marre.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a name="Mon_antivirus"></a>Mon
                                                antivirus bloque
                                                l'ouverture du CD,&nbsp; qui pourtant fonctionnait tr�s bien avant,
                                                que faire?</span><br>
                                                Aucune inqui�tude � avoir. Cela est possible si vous avez achet� nos
                                                produits en 2008. Ceci en raison d'une mise � jours de certains
                                                antivirus qui ne tienne pas compte de petites soci�t�s telle que la
                                                notre et sans rentrer dans de longs discours nous d�tecte par erreur...
                                                Notre produit est certifi� sans virus. Bien sur nous avons remediez �
                                                ce probleme en developpant une nouvelle version de notre programme,
                                                contacter notre service clientelle.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Jai_cliqu�_sur_lic�ne_de_limprimante"></a>J'ai
                                                cliqu� sur l'ic�ne
                                                de l'imprimante pour visualiser et imprimer les pi�ces de mon patron,
                                                mais&nbsp;l'impression ne se lance pas?</span><br>
                                                Cette ic�ne vous sert � v�rifier la configuration de votre imprimante.
                                                Elle doit �tre en mode portrait, et feuilles A4. Une fois ceci v�rifi�
                                                et �ventuellement rectifi�, rendez vous vous sur la liste des pi�ces du
                                                patron afin de les imprimer une � une (voir la notice d'utilisation).<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Faut-il_beaucoup_de_feuille"></a>Faut-il
                                                beaucoup de
                                                feuilles ?</span><br>
                                                S'agissant d'un patron grandeur nature, il est normale d'avoir un
                                                nombre de feuilles en proportions : <br>
                                                Compter entre 25 et 40 feuilles par mod�le complet.<br>
                                                Pour information, le co�t d'une impression vous revient entre 0,25 et
                                                0,40 euros. Nous sommes toujours bien loin des pris d'un patron �
                                                l'unit�.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Puis_adapter_mon_patron"></a>Puis adapter mon
                                                patron
                                                en fonction de mes mensurations devant et dos ?</span><br>
                                                Le logiciel vous demande 4 mensurations en cm : hauteur, tour de
                                                taille, de hanche et de poitrine. Vous devrez les prendre
                                                m�ticuleusement, sans rajouter de cms d'aisance. Le programme r�parti
                                                ensuite proportionnellement ces donn�es entre le devant et le dos du
                                                patron comme un patron standard achet� � l'unit�. Vous n'avez pas la
                                                possibilit� de dissocier les parties devant et dos.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Puis-je_adapter_mon_patron"></a>Puis-je adapter
                                                mon
                                                patron en fonction d'autre mensurations telles que&nbsp; ma hauteur
                                                de taille, ou de ma hauteur de&nbsp;jambe?</span><br>
                                                Non, la version que nous vous proposons de nos produits permet de
                                                travailler uniquement � partir du tour de taille, tour de hanche, de
                                                poitrine, ainsi que votre hauteur. Les autres mensurations seront
                                                d�finies proportionnellement � ces 4 mesures.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Puis_je_r�duire_mon_patron"></a>Puis je r�duire
                                                mon
                                                patron ?</span><br>
                                                Oui, de 4 fois, ou de 10 fois au choix. Suivre la d�marche dans la
                                                notice explicative.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a name="Jai_acc�_"></a>J'ai
                                                acc� � un
                                                mannequin virtuel, � quoi sert -il ?</span><br>
                                                Ce mannequin ne vous est d'aucune utilit� sur la version que nous
                                                commercialisons. Merci de ne pas en tenir compte.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Est_il_normal_davoir_sur_le_CD_pantalon"></a>Est
                                                il normal d'avoir sur
                                                le CD pantalon � rentrer le tour de poitrine?</span><br>
                                                Pour chaque CD, la technologie utilis�e est la m�me, ind�pendamment du
                                                patron pr�sent�. Vous devez donc rentrer toujours les 4 mensurations
                                                requises quel que soit le mod�le.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Pourquoi_un_CD_XXL"></a>Pourquoi un CD XXL si
                                                les
                                                mensurations possibles sont identiques aux autres Cds ?</span><br>
                                                Pour la collection XXL, les mod�les ont la particularit� d'�tre presque
                                                tous �lastiqu�s pour plus de confort. Les pinces sont elles aussi
                                                ajust�e � certains endroits sp�cifiques aux grandes tailles.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Si_jai_un_probl�me"></a>Si j'ai un probl�me dans
                                                la r�alisation du patron, puis je �tre aid�e ?</span><br>
                                                Nous sommes commer�ants, licenci� de la technologie Leko.&nbsp; A
                                                ce titre, nous ne sommes pas form�s pour enseigner la couture.
                                                Cependant dans la mesure du possible, notre responsable client�le,
                                                couturi�re amatrice, fera son possible pour vous aider.<br>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Pourrais_je_avoir_des_instructions_de"></a>Pourrais
                                                je avoir des
                                                instructions de montage ?</span><br>
                                                Chaque mod�le est accompagn� d'instructions de&nbsp; couture
                                                �crites. De plus vous pourrez visualiser la dispositions des
                                                pi�ces&nbsp; les unes par rapport aux autres gr�ce � un sch�ma de
                                                montage&nbsp; (se reporter � la notice).<br>
                                                <div class="grey"><a
                                                name="Burn"></a><big><big><big>Assistance
                                                pour la gravure de nos fichiers ISO.<br>
                                                </big></big></big></div><br><div class="attention">Il est imp�ratif de graver le logiciel sur un CD.</div>
                                                <br>
                                                <span style="font-weight: bold;"><a
                                                name="Fichier"></a>Ou trouver mon fichier � t�l�charger?</span><br>
                                                Toutes les informations n�cessaires pour t�l�charger votre CDs se trouvent ici: <b><i><a href="faqdownload.php">Cliquez ici</a></b></i><br>
                                                <br><span style="font-weight: bold;"><a
                                                name="Logiciel"></a>Je n'ai pas de logiciel pour graver une image iso/le fichier t�l�charg�.</span><br>
                                                Vous pouvez t�l�charger le logiciel gratuit "BurnAware" qui vous permettra de graver sur CD les fichiers t�l�charg�s. <b><i><a href="http://www.clubic.com/telecharger-fiche182902-burnaware-free-edition.html" target="_blank">Cliquez ici pour acc�der � la page de t�l�chargement sur www.clubic.com</a></i></b><br>
                                                <br><span style="font-weight: bold;"><a
                                                name="USB"></a>Puis-je installer le programme sur un clef USB?</span><br>
                                                Pour des raisons de s�curit�, notre logiciel ne fonctionnera correctement seulement s'il est grav� sur un CD. Il n'est pas possible de le faire marcher correctement � partir d'une clef USB ou du disque dur de votre ordinateur.<br>
                                                <br><span style="font-weight: bold;"><a
                                                name="HD"></a>Puis-je installer le programme sur mon disque dur?</span><br>
                                                Pour des raisons de s�curit�, notre logiciel ne fonctionnera correctement seulement s'il est grav� sur un CD. Il n'est pas possible de le faire marcher correctement � partir d'une clef USB ou du disque dur de votre ordinateur.<br>
                                                <br><span style="font-weight: bold;"><a
                                                name="printer"></a>Je n'arrive pas � imprimer?</span><br>
                                                Nos fichiers ont �t� test�s de fa�on extensive et fonctionnent correctement. Par exp�rience, des probl�mes d'impr�ssion surviennent lorsque le programme n'est pas lanc� � partir du CD. Assurez-vous que le programme est bien grav� sur un CD. Si malgr� cela vous avez toujours des probl�mes d'impression, n'h�sitez pas � nous contacter apr�s avoir lu la notice d'utilisation et parcouru la foire aux question.
                                                <br><b><i><a target="_blank" href="/shop/_includes/explications.pdf">Cliquez ici pour la notice d'utilisation de nos CDs.</a>
                                                <br><a href="faq.php">Cliquez ici pour parcourir la foire aux question.</a>
                                                <br><a href="contact_us.php">Cliquez ici pour nous contacter.</a></i></b><br>
                                                <br><span style="font-weight: bold;"><a
                                                name="Menu"></a>Je n'ai pas l'option menu lorsque je s�lectionne un patron dans le logiciel.</span><br>
                                                Nos fichiers ont �t� test� de fa�on extensive et fonctionnent correctement. Par exp�rience, des probl�mes d'impr�ssion surviennent lorsque le programme n'est pas lanc� � partir du CD. Assurez-vous que le programme est bien grav� sur un CD. Si malgr� cela vous avez toujours des probl�mes d'impression, n'h�sitez pas � nous contacter apr�s avoir lu la notice d'utilisation et parcouru la foire aux question.
                                                <br><b><i><a target="_blank" href="/shop/_includes/explications.pdf">Cliquez ici pour la notice d'utilisation de nos CDs.</a>
                                                <br><a href="faq.php">Cliquez ici pour parcourir la foire aux question.</a>
                                                <br><a href="contact_us.php">Cliquez ici pour nous contacter.</a></i></b><br>
                                                <br><span style="font-weight: bold;"><a
                                                name="Copy"></a>Puis-je faire autant de CDs que je le d�sire?</span><br>
                                                Pour votre confort, la loi fran�aise autorise une copie de sauvegarde de notre CD. Faire d'autres copies � des fins de dons, vente ou pr�t n'est pas autoris� et s'apparente � du piratage.<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                    <tr>
                                                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                        <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                                                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                    </tr>
                                                </table>
                                            </tr>

                                        </table>
                                    </td>
                                    <!-- main_body_text_eof //-->
<!--- This_File_eof --->

<?php
    require('footer_main.php');
?>
