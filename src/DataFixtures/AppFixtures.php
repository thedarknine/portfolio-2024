<?php

namespace App\DataFixtures;

use App\Entity\ArcadeType;
use App\Entity\Company;
use App\Entity\CreationType;
use App\Entity\Education;
use App\Entity\Experience;
use App\Entity\PhotoType;
use App\Entity\Project;
use App\Entity\School;
use App\Entity\Skill;
use App\Entity\SkillType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private array $arcadeTypesList = [
        ['label' => 'final', 'name' => 'This is it!', 'position' => 1],
        ['label' => 'at-the-beginning', 'name' => 'Les plans', 'position' => 2],
        ['label' => 'side-panels', 'name' => 'Side Panels', 'position' => 3],
        ['label' => 'control-panel', 'name' => 'Control Panel', 'position' => 4],
        ['label' => 'upper-part', 'name' => 'Upper Part', 'position' => 5],
        ['label' => 'back-side', 'name' => 'Back Side', 'position' => 6],
        ['label' => 'assembling', 'name' => 'Assemblage', 'position' => 7],
        ['label' => 'design', 'name' => 'Design', 'position' => 8],
        ['label' => 'recalbox', 'name' => 'Recalbox', 'position' => 9],
        ['label' => 'materiel', 'name' => 'Matériel', 'position' => 10],
        ['label' => 'composants', 'name' => 'Composants', 'position' => 11],
    ];
    private array $companiesList = [
        ['label' => 'limos', 'name' => "LIMOS (Laboratoire d'Informatique, de Modélisation et d'Optimisation des Systèmes)", 'city' => 'Aubière', 'department' => 63, 'url' => '', 'logo' => 'limos.png'],
        ['label' => 'periscope-creations', 'name' => 'Periscope Créations', 'city' => 'Clermont-Ferrand', 'department' => 63, 'url' => '', 'logo' => 'periscope.png'],
        ['label' => 'actif-design', 'name' => 'ActifDesign', 'city' => 'Les Martres-de-Veyre', 'department' => 63, 'url' => '', 'logo' => 'actif-design.png'],
        ['label' => 'allegorithmic', 'name' => 'Allegorithmic', 'city' => 'Clermont-Ferrand', 'department' => 63, 'url' => '', 'logo' => 'allegorithmic.png'],
        ['label' => 'mfpdd', 'name' => 'Mutualité Française du Puy-de-Dôme', 'city' => 'Clermont-Ferrand', 'department' => 63, 'url' => '', 'logo' => 'mutualite.png'],
        ['label' => 'coffreo', 'name' => 'Coffreo', 'city' => 'Aubière', 'department' => 63, 'url' => '', 'logo' => 'coffreo.png'],
        ['label' => 'perfect-memory', 'name' => 'Perfect Memory', 'city' => 'Chamalières', 'department' => 63, 'url' => '', 'logo' => 'perfect-memory.png'],
    ];
    private array $creationTypesList = [
        ['label' => 'argile-mat', 'name' => 'Argile Mat', 'position' => 1],
        ['label' => 'argile-cire', 'name' => 'Argile Ciré', 'position' => 2],
        ['label' => 'argile-peint', 'name' => 'Argile Peint', 'position' => 3],
        ['label' => 'argile-vernis', 'name' => 'Argile Vernis', 'position' => 4],
        ['label' => 'argile-tour', 'name' => 'Au tour', 'position' => 5],
    ];
    private array $photoTypesList = [
        ['label' => 'sky', 'name' => 'Sky', 'position' => 1],
        ['label' => 'nature', 'name' => 'Nature', 'position' => 2],
        ['label' => 'night', 'name' => 'Night', 'position' => 3],
        ['label' => 'city', 'name' => 'City', 'position' => 4],
        ['label' => 'ici-ailleurs', 'name' => 'Ici et ailleurs', 'position' => 5],
    ];
    private array $schoolsList = [
        ['label' => 'univ-orleans', 'name' => "Université d'Orléans", 'city' => 'Bourges', 'department' => 18, 'logo' => 'univ-orleans.png'],
        ['label' => 'ubp-clermont', 'name' => 'Université Blaise Pascal', 'city' => 'Aubière', 'department' => 63, 'logo' => 'ubp.png'],
        ['label' => 'ubp-vichy', 'name' => 'Université Blaise Pascal - Pôle Universitaire Vichy ', 'city' => 'Vichy', 'department' => 3, 'logo' => 'pole-ubp-vichy.png'],
        ['label' => 'actinuum', 'name' => 'Actinuum', 'city' => 'Paris', 'department' => 75, 'logo' => 'actinuum.png'],
        ['label' => 'design-crew', 'name' => 'Actinuum', 'city' => 'Paris', 'department' => 75, 'logo' => 'the-design-crew.png'],
    ];
    private array $skillTypesList = [
        ['label' => 'methodo', 'name' => 'Méthodologie et Agilité', 'logo' => 'skills-methodologie.png', 'position' => 1],
        ['label' => 'design', 'name' => 'Design', 'logo' => 'skills-design.png', 'position' => 2],
        ['label' => 'back-end', 'name' => 'Back-End', 'logo' => 'skills-backend.png', 'position' => 3],
        ['label' => 'front-end', 'name' => 'Front-End', 'logo' => 'skills-frontend.png', 'position' => 4],
        ['label' => 'sysadmin', 'name' => 'Systèmes et Administration', 'logo' => 'skills-sysadmin.png', 'position' => 5],
    ];
    private array $skillsList = [
        ['label' => 'jira', 'name' => 'Jira', 'startYear' => 2018, 'endYear' => null, 'level' => 8, 'logo' => 'jira.png', 'position' => 1, 'type' => 'methodo', 'display' => true],
        ['label' => 'agile', 'name' => 'Agile', 'startYear' => 2018, 'endYear' => null, 'level' => 6, 'logo' => 'agile.png', 'position' => 2, 'type' => 'methodo', 'display' => true],
        ['label' => 'trello', 'name' => 'Trello', 'startYear' => 2017, 'endYear' => null, 'level' => 7, 'logo' => 'trello.png', 'position' => 3, 'type' => 'methodo', 'display' => true],
        ['label' => 'product-discovery', 'name' => 'Product Disc', 'startYear' => 2022, 'endYear' => null, 'level' => 6, 'logo' => 'product-discovery.png', 'position' => 4, 'type' => 'methodo', 'display' => true],
        ['label' => 'confluence', 'name' => 'Confluence', 'startYear' => 2018, 'endYear' => null, 'level' => 6, 'logo' => 'confluence.png', 'position' => 5, 'type' => 'methodo', 'display' => true],
        ['label' => 'miro', 'name' => 'Miro', 'startYear' => 2018, 'endYear' => 2022, 'level' => 7, 'logo' => 'miro.png', 'position' => 6, 'type' => 'methodo', 'display' => true],
        ['label' => 'figma', 'name' => 'Figma', 'startYear' => 2020, 'endYear' => null, 'level' => 7, 'logo' => 'figma.png', 'position' => 1, 'type' => 'design', 'display' => true],
        ['label' => 'moqups', 'name' => 'Moqups', 'startYear' => 2018, 'endYear' => 2021, 'level' => 6, 'logo' => 'moqups.png', 'position' => 2, 'type' => 'design', 'display' => true],
        ['label' => 'illustrator', 'name' => 'Illustrator', 'startYear' => 2010, 'endYear' => 2022, 'level' => 5, 'logo' => 'illustrator.png', 'position' => 3, 'type' => 'design', 'display' => true],
        ['label' => 'photoshop', 'name' => 'Photoshop', 'startYear' => 2006, 'endYear' => 2017, 'level' => 3, 'logo' => 'photoshop.png', 'position' => 4, 'type' => 'design', 'display' => true],
        ['label' => 'mysql', 'name' => 'MySQL', 'startYear' => 2005, 'endYear' => null, 'level' => 8, 'logo' => 'mysql.png', 'position' => 1, 'type' => 'back-end', 'display' => true],
        ['label' => 'mongodb', 'name' => 'MongoDB', 'startYear' => 2017, 'endYear' => 2022, 'level' => 7, 'logo' => 'mongodb.png', 'position' => 2, 'type' => 'back-end', 'display' => true],
        ['label' => 'graphdb', 'name' => 'GraphDB', 'startYear' => 2022, 'endYear' => 2023, 'level' => 2, 'logo' => 'graphdb.png', 'position' => 3, 'type' => 'back-end', 'display' => true],
        ['label' => 'symfony', 'name' => 'Symfony', 'startYear' => 2017, 'endYear' => null, 'level' => 6, 'logo' => 'symfony.png', 'position' => 4, 'type' => 'back-end', 'display' => true],
        ['label' => 'php', 'name' => 'PHP', 'startYear' => 2005, 'endYear' => null, 'level' => 9, 'logo' => 'php.png', 'position' => 5, 'type' => 'back-end', 'display' => true],
        ['label' => 'python', 'name' => 'Python', 'startYear' => 2018, 'endYear' => 2022, 'level' => 6, 'logo' => 'python.png', 'position' => 6, 'type' => 'back-end', 'display' => true],
        ['label' => 'rabbitmq', 'name' => 'RabbitMQ', 'startYear' => 2017, 'endYear' => 2022, 'level' => 5, 'logo' => 'rabbitmq.png', 'position' => 7, 'type' => 'back-end', 'display' => true],
        ['label' => 'webservices', 'name' => 'Webservices', 'startYear' => 2010, 'endYear' => 2021, 'level' => 6, 'logo' => 'webservices.png', 'position' => 8, 'type' => 'back-end', 'display' => true],
        ['label' => 'mvc', 'name' => 'MVC', 'startYear' => 2008, 'endYear' => 2019, 'level' => 7, 'logo' => 'mvc.png', 'position' => 9, 'type' => 'back-end', 'display' => true],
        ['label' => 'phpstorm', 'name' => 'PHPStorm', 'startYear' => 2017, 'endYear' => 2022, 'level' => 8, 'logo' => 'phpstorm.png', 'position' => 10, 'type' => 'back-end', 'display' => false],
        ['label' => 'zend', 'name' => 'Zend', 'startYear' => 2008, 'endYear' => 2012, 'level' => 5, 'logo' => 'zend.png', 'position' => 11, 'type' => 'back-end', 'display' => false],
        ['label' => 'cplus', 'name' => 'C++', 'startYear' => 2002, 'endYear' => 2006, 'level' => 6, 'logo' => 'cplus.png', 'position' => 12, 'type' => 'back-end', 'display' => false],
        ['label' => 'html', 'name' => 'HTML', 'startYear' => 2004, 'endYear' => null, 'level' => 9, 'logo' => 'html.png', 'position' => 1, 'type' => 'front-end', 'display' => true],
        ['label' => 'css', 'name' => 'CSS', 'startYear' => 2004, 'endYear' => null, 'level' => 9, 'logo' => 'css.png', 'position' => 2, 'type' => 'front-end', 'display' => true],
        ['label' => 'sass', 'name' => 'Sass', 'startYear' => 2016, 'endYear' => null, 'level' => 7, 'logo' => 'sass.png', 'position' => 3, 'type' => 'front-end', 'display' => true],
        ['label' => 'twig', 'name' => 'Twig', 'startYear' => 2015, 'endYear' => null, 'level' => 8, 'logo' => 'twig.png', 'position' => 4, 'type' => 'front-end', 'display' => true],
        ['label' => 'webpack', 'name' => 'Webpack', 'startYear' => 2018, 'endYear' => 2022, 'level' => 4, 'logo' => 'webpack.png', 'position' => 5, 'type' => 'front-end', 'display' => true],
        ['label' => 'jquery', 'name' => 'jQuery', 'startYear' => 2015, 'endYear' => null, 'level' => 6, 'logo' => 'jquery.png', 'position' => 6, 'type' => 'front-end', 'display' => true],
        ['label' => 'ajax', 'name' => 'Ajax', 'startYear' => 2015, 'endYear' => 2018, 'level' => 5, 'logo' => 'ajax.png', 'position' => 7, 'type' => 'front-end', 'display' => true],
        ['label' => 'materialize', 'name' => 'Materialize', 'startYear' => 2016, 'endYear' => null, 'level' => 7, 'logo' => 'materialize.png', 'position' => 8, 'type' => 'front-end', 'display' => true],
        ['label' => 'bootstrap', 'name' => 'Bootstrap', 'startYear' => 2015, 'endYear' => 2017, 'level' => 6, 'logo' => 'bootstrap.png', 'position' => 9, 'type' => 'front-end', 'display' => true],
        ['label' => 'responsive', 'name' => 'Responsive', 'startYear' => 2015, 'endYear' => 2020, 'level' => 7, 'logo' => 'responsive.png', 'position' => 10, 'type' => 'front-end', 'display' => false],
        ['label' => 'xhtmlcss', 'name' => 'xHTML/CSS', 'startYear' => 2006, 'endYear' => 2008, 'level' => 8, 'logo' => 'xhtmlcss.png', 'position' => 11, 'type' => 'front-end', 'display' => false],
        ['label' => 'apache', 'name' => 'Apache', 'startYear' => 2005, 'endYear' => 2017, 'level' => 5, 'logo' => 'apache.png', 'position' => 1, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'git', 'name' => 'Git', 'startYear' => 2015, 'endYear' => null, 'level' => 7, 'logo' => 'git.png', 'position' => 2, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'composer', 'name' => 'Composer', 'startYear' => 2015, 'endYear' => null, 'level' => 7, 'logo' => 'composer.png', 'position' => 3, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'docker', 'name' => 'Docker', 'startYear' => 2018, 'endYear' => 2022, 'level' => 4, 'logo' => 'docker.png', 'position' => 4, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'svn', 'name' => 'SVN', 'startYear' => 2008, 'endYear' => 2012, 'level' => 6, 'logo' => 'svn.png', 'position' => 5, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'macos', 'name' => 'MacOS X', 'startYear' => 2006, 'endYear' => null, 'level' => 8, 'logo' => 'mac.png', 'position' => 6, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'linux', 'name' => 'Linux', 'startYear' => 2003, 'endYear' => null, 'level' => 7, 'logo' => 'linux.png', 'position' => 7, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'windows', 'name' => 'Windows', 'startYear' => 1996, 'endYear' => null, 'level' => 5, 'logo' => 'windows.png', 'position' => 8, 'type' => 'sysadmin', 'display' => false],
        ['label' => 'drupal', 'name' => 'Drupal', 'startYear' => 2008, 'endYear' => 2012, 'level' => 3, 'logo' => 'drupal.png', 'position' => 9, 'type' => 'sysadmin', 'display' => false],

        ['label' => 'kibana', 'name' => 'Kibana', 'startYear' => 2019, 'endYear' => 2022, 'level' => 3, 'logo' => 'kibana.png', 'position' => 11, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'zendesk', 'name' => 'Zendesk', 'startYear' => 2019, 'endYear' => 2022, 'level' => 4, 'logo' => 'zendesk.png', 'position' => 12, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'mailchimp', 'name' => 'MailChimp', 'startYear' => 2019, 'endYear' => 2022, 'level' => 4, 'logo' => 'mailchimp.png', 'position' => 10, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'postman', 'name' => 'Postman', 'startYear' => 2019, 'endYear' => null, 'level' => 5, 'logo' => 'postman.png', 'position' => 13, 'type' => 'sysadmin', 'display' => true],
        ['label' => 'slack', 'name' => 'Slack', 'startYear' => 2018, 'endYear' => null, 'level' => 7, 'logo' => 'slack.png', 'position' => 7, 'type' => 'methodo', 'display' => false],
        ['label' => 'teams', 'name' => 'Teams', 'startYear' => 2022, 'endYear' => null, 'level' => 4, 'logo' => 'teams.png', 'position' => 8, 'type' => 'methodo', 'display' => false],
    ];
    private array $experiencesList = [
        ['label' => 'stage-limos', 'title' => 'Stagiaire en milieu de recherche', 'subtitle' => "Stage de recherche au sein de l'équipe Algorithmique au LIMOS",
            'description' => '
<p>Sujet : <em>Symétrie dans les familles d\'ensembles : une étude algorithmique</em></p>
<p class="text-center pt1"><a class="btn waves-effect btn-nine hvr-grow-shadow grey darken-1" href="http://docs.carolinenoyer.fr/pdf/cnoyer-rapportdestage-dea-2005.pdf" target="_blank" title="Téléchargez le rapport de stage"><i class="fas fa-paperclip" aria-hidden="true"></i> Rapport de stage</a></p>
<p class="text-justify pt5 text-09"><i>Résumé : </i>On souhaite définir la notion de symétrie entre attributs dans une famille d\'ensembles. Une première réponse a été proposée par R. Medina et L. Nourine à travers la notion de clones. Deux attributs sont clones s\'ils sont interchangeables dans les ensembles de la famille. Ici, on s\'intéresse au degré de symétrie entre deux attributs : la similitude. Cette mesure est représentée dans une matrice indiquant pour tout couple d\'attributs, la "distance" qui les sépare. Différents algorithmes de calcul de cette similitude sont proposés, et, sous certaines conditions, l\'un d\'entre eux est optimal. Enfin, nous montrons le lien qui existe entre attributs clones et sommets jumeaux d\'un graphe.</p>
<div class="pt5 mb1">
    <p><strong class="">Publication</strong></p>
    <div class="bordered-grey ml2 pl1">
         <p class="text-justify">Deux articles de recherche ont été rédigés à l\'issue de ce stage dont un, <strong>"Efficient algorithms for clone items detection"</strong>, publié pour la conférence <em>CLA\'05 (Concept Lattices and Their Applications) - République Tchèque</em></p>
         <p class="mt0 mr2"><a class="btn waves-effect btn-nine hvr-grow-shadow grey darken-1" href="http://docs.carolinenoyer.fr/pdf/article-clones-cla05.pdf" target="_blank" title="Efficient algorithms for clone items detection"><i class="fas fa-paperclip" aria-hidden="true"></i> Article publié</a></p>
    </div>
</div>',
            'startDate' => '2005-02-01', 'endDate' => '2005-07-31', 'company' => 'limos', 'skills' => ['cplus']],
        ['label' => 'stage-periscope', 'title' => 'Stagiaire études de projets Internet', 'subtitle' => 'Stage en entreprise dans le cadre du Master Professionnel SIPPE 2ème année',
            'description' => '
<ul class="missions">
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Analyse de la demande des internautes selon des mots-clés afin d\'optimiser la structure du site Internet et son référencement</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Rédaction de recommandations pour la restructuration de sites, la modiﬁcation du contenu, l\'étude de concurrence, ou encore la mise en place d\'une stratégie (animations, jeux, ...)</span></li>
</ul>
<p class="text-justify pt5 text-09"><i>Résumé : </i>Le domaine de la communication sur Internet est très complexe. 
Dans le contexte de la société Periscope, le travail d\'un chef de projet va au-delà de la simple étude d\'architecture du site et du choix de technologies, 
il s\'étend vers l\'étude afin de pouvoir apporter un réel conseil aux clients. Ainsi, mon travail s\'est orienté en majorité vers l\'étude de marchés. 
Ce type d\'analyse doit pouvoir permettre de savoir quels sont les éléments à mettre en avant sur le site, aussi bien au niveau fonctionnel qu\'au niveau des produits. 
Une fois l\'étude finalisée, on va pouvoir rédiger des recommandations auprès du client et lui permettre de bénéficier de la réalisation d\'un site dont le contenu sera en adéquation avec la demande actuelle. 
L\'une des dernières étapes avant la mise en production consiste à réaliser un zoning des différentes pages du site, c\'est-à-dire préciser à quel endroit se situeront les éléments, 
ce n\'est qu\'ensuite que le directeur artistique pourra réaliser la maquette du site.</p>',
            'startDate' => '2006-02-01', 'endDate' => '2006-06-30', 'company' => 'periscope-creations', 'skills' => []],
        ['label' => 'stage-actifdesign', 'title' => 'Stagiaire analyse et développement', 'subtitle' => 'Stage en entreprise dans le cadre du Master Professionnel SIPPE 2ème année',
            'description' => '
<ul class="missions">
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Conception et réalisation d\'un assistant pour la rédaction des cahiers des charges</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Génération de fichiers PDF via l\'interface à partir de sources <em>LaTeX</em></span></li>
</ul>
<p class="text-center pt1"><a class="btn waves-effect btn-nine hvr-grow-shadow grey darken-1" href="http://docs.carolinenoyer.fr/pdf/cnoyer-rapportdestage-m2pro-2006.pdf" target="_blank" title="Téléchargez le rapport de stage"><i class="fas fa-paperclip" aria-hidden="true"></i> Rapport de stage</a></p>
<p class="text-justify pt5 text-09"><i>Résumé : </i>La société Actifdesign souhaite donc développer des solutions de catalogues en ligne ou des solutions de e-commerce. L\'inconvénient de la mise en place de tels projets réside dans la rédaction du cahier des charges, devant être remis rapidement au client. Afin de réduire les temps de rédaction, sans en perdre le sérieux ni la pertinence, elle souhaite factoriser au maximum les parties communes entre les différents cahiers des charges. En effet, ce type de travail passe très souvent par une phase de copier/coller intempestifs !<br>
Ce projet nécessite donc plusieurs documents : le cahier des charges, le devis pour le client, les fiches navettes destinées aux développeurs (contenant les modules à installer et les délais à respecter), ainsi que celle pour le graphiste.<br>
Cet outil doit donc proposer une rédaction semi-automatique de ces documents à partir de questionnaires précis. Ainsi, mon projet permet de répondre à la mise en place d\'une organisation du travail tout en respectant la contrainte de coût.</p>',
            'startDate' => '2006-07-01', 'endDate' => '2006-09-30', 'company' => 'actif-design', 'skills' => ['php', 'mysql', 'xhtmlcss', 'linux', 'photoshop']],
        ['label' => 'dev-web', 'title' => 'Développeur web et chargée de projets', 'subtitle' => 'Développement de sites Internet et de solutions innovantes',
            'description' => '
<ul class="missions">
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Rédaction de cahiers des charges et planification de projets</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Développement web</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Intégration de sites valides aux normes du <b>W3C</b></span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Développement de l\'outil &nbsp;<a href="http://www.carolinenoyer.fr/projets#nevotec" title="NevoTec">NevoTec</a></span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Développement de l\'outil &nbsp;<a href="http://www.carolinenoyer.fr/projets#nevoprint" title="NevoPrint">NevoPrint</a></span></li>
</ul>',
            'startDate' => '2006-10-01', 'endDate' => '2008-07-15', 'company' => 'actif-design', 'skills' => ['php', 'mysql', 'xhtmlcss', 'linux', 'photoshop', 'apache']],
        ['label' => 'inge-dev', 'title' => 'Ingénieur de développement', 'subtitle' => "Développement de l'outil Cadenza",
            'description' => '
<ul class="missions">
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Développement d\'une plate-forme interne de gestion et de suivi de projets</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Mise en place de solutions afin de faciliter le travail en équipe</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Maintenance du site de l\'entreprise et du site support produits</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Sécurisation du logiciel <a href="https://www.allegorithmic.com/substance" target="_blank"><strong>Substance</strong></a> développé par la société</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Administration système pour des postes sous Windows XP, Windows Seven, Linux Fedora</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Administration réseau : gestion du firewall <strong>MonoWall</strong>, gestion de disques en partage <strong>FreeNAS</strong></span></li>
</ul>',
            'startDate' => '2008-07-16', 'endDate' => '2012-04-30', 'company' => 'allegorithmic', 'skills' => ['xhtmlcss', 'php', 'mysql', 'zend', 'mvc', 'linux', 'svn', 'drupal', 'illustrator', 'photoshop', 'windows']],
        ['label' => 'dev-mfpdd', 'title' => 'Développeur web fullstack', 'subtitle' => 'Conception et développement du projet PREV@PASS',
            'description' => '
<p class="text-justify pt5">Le Projet <a class="" href="https://www.sante-auvergne.fr/" title="PREVAPASS" target="_blank"><strong>PREV@PASS</strong></a> (Parcours Accompagné Soins et Santé) permet une prise en charge coordonnée des patients dans le cadre d\'une médecine de parcours, incluant la prévention et l\'éducation thérapeutique du patient. Ce nouveau système d\'information vise à mieux synchroniser les actions de tous les professionnels du médical et du médico-social au profit de la prise en charge de qualité et sécurisée du patient.</p>
<p class="text-center"><a class="" href="https://www.sante-auvergne.fr/" title="Site Prev@PASS" target="_blank"><img src="http://carolinenoyer.fr/images/company/logo_prevapass.jpg" class="rounded responsive-img hvr-grow-shadow image-btn" alt="Prev@PASS"></a></p>
<ul class="missions">
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Création graphique de l\'interface</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Développement front-end</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Développement back-end, sur une architecture MVC utilisant le micro-framework <b>Silex</b> (basé sur <b>Symfony2</b>)</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Mise en place de webservices</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i><span>Scripts pour l\'automatisation des tâches</span></li>
</ul>',
            'startDate' => '2015-05-04', 'endDate' => '2017-07-16', 'company' => 'mfpdd', 'skills' => ['html', 'css', 'jquery', 'ajax', 'bootstrap', 'twig', 'responsive', 'php', 'mysql', 'webservices', 'mvc', 'python', 'composer', 'git']],
        ['label' => 'dev-coffreo', 'title' => 'Développeur PHP Senior', 'subtitle' => 'Conception et développement des produits Coffreo Pro',
            'description' => '
<p class="text-justify pt5"><a class="" href="http://www.coffreo.biz/" title="Coffreo" target="_blank"><strong>COFFREO</strong></a>, acteur majeur de la dématérialisation RH et du coffre-fort numérique, sécurise et rend agile la relation entre employeurs et leurs salariés là où elle représente un fort enjeu pour leur activité, et accompagne les salariés quelle que soit leur situation afin de faciliter l’accès à l’emploi.</p>
<ul class="missions">
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Squad leader d\'un nouveau produit pour l\'offre Coffreo Pro (gestion de projet)</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Analyse et rédaction des spécifications techniques du produit</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Suivi des développements de l\'équipe et synchronisation avec le chef de projets</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Support clients du produit</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Développement Back &amp; API sur le Framework Symfony sur le principe de micro services</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Création d\'un service supplémentaire basé sur API-Platform</span></li>
</ul>',
            'startDate' => '2017-07-17', 'endDate' => '2019-11-03', 'company' => 'coffreo', 'skills' => ['html', 'materialize', 'twig', 'responsive', 'php', 'mongodb', 'symfony', 'rabbitmq', 'linux', 'composer', 'git', 'docker', 'kibana', 'postman', 'mailchimp', 'slack']],
        ['label' => 'po-coffreo', 'title' => 'Product Owner', 'subtitle' => 'Animation des sprints et coordination des développements',
            'description' => '
<p class="text-justify pt5">Charnière entre l’équipe technique, l’équipe marketing et les clients.</p>
<ul class="missions">
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Gestion de projet méthodologie Agile / Scrum</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Création et gestion du Product Backlog</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Rédaction des Users Stories</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Priorisation des besoins et exigences métier</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Suivi de l’avancement des projets, du planning de livraison et des engagements</span></li>
</ul>',
            'startDate' => '2019-11-04', 'endDate' => '2022-07-17', 'company' => 'coffreo', 'skills' => ['agile', 'jira', 'figma', 'python', 'moqups', 'trello', 'confluence', 'kibana', 'postman', 'mailchimp', 'slack']],
        ['label' => 'po-perfect', 'title' => 'Product Owner', 'subtitle' => 'Encadrement R&D et qualité produit',
            'description' => '
<p class="text-justify pt5">Charnière entre les équipes de développement, l\'équipe design et l\'équipe qualité.</p>
<ul class="missions">
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Encadrement des équipes de développement</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>Qualité Produit</span></li>
    <li><i class="fas fa-tasks" aria-hidden="true"></i> <span>	
Rédaction des expressions de besoin et spécifications fonctionnelles</span></li>
</ul>',
            'startDate' => '2022-07-18', 'endDate' => null, 'company' => 'perfect-memory', 'skills' => ['agile', 'jira', 'product-discovery', 'confluence', 'teams']],
    ];

    private $educationsList = [
        ['label' => 'design', 'title' => 'Product Designer', 'year' => 2021, 'type' => 'pro', 'school' => 'design-crew', 'details' => 'Certification formation Advanced'],
        ['label' => 'agile', 'title' => 'Responsable de produit agile', 'year' => 2020, 'type' => 'pro', 'school' => 'actinuum', 'details' => 'Certification Scrum Product Owner'],
        ['label' => 'm2-pro', 'title' => 'Master 2 Professionnel SIPPE', 'year' => 2006, 'type' => 'univ', 'school' => 'ubp-vichy', 'details' => 'Stratégies Internet et Pilotage de Projets en Entreprise', 'speciality' => 'Informatique', 'mention' => 'Très bien'],
        ['label' => 'm2-rech', 'title' => 'DEA Informatique', 'year' => 2005, 'type' => 'univ', 'school' => 'ubp-clermont', 'details' => 'Modèle, Système, Intelligence', 'speciality' => 'Systèmes d\'information et de communication'],
        ['label' => 'maitrise', 'title' => 'Maîtrise Informatique', 'year' => 2004, 'type' => 'univ', 'school' => 'ubp-clermont', 'details' => 'Sciences et Technologies - Mention Informatique', 'speciality' => 'Classification, data-mining et algorithmique pour les grandes bases', 'mention' => 'Bien'],
        ['label' => 'licence', 'title' => 'Licence Informatique', 'year' => 2003, 'type' => 'univ', 'school' => 'ubp-clermont', 'details' => 'Sciences et Technologies - Mention Informatique', 'speciality' => 'Optimisation et technologies de l\'information', 'mention' => 'Assez bien'],
        ['label' => 'deug', 'title' => 'DEUG MIAS', 'year' => 2002, 'type' => 'univ', 'school' => 'univ-orleans', 'details' => 'Mathématiques, informatique et applications aux sciences', 'speciality' => 'Sciences de la Vie et de la Terre'],
    ];
    private $projectsList = [
        ['label' => 'datamining', 'name' => 'Fouille de données interactive par navigation', 'period' => 'De avril 2004 à juillet 2004', 'year' => 2004,
            'description' => '
Réalisation d\'une bibliothèque <b>C++</b> à l\'aide de la <b>STL</b> afin de l\'interfacer avec l\'outil de navigation.
<p class="center-align pt-20"><a class="btn btn-flat btn-nine waves-effect waves-light hvr-grow-shadow" href="https://web.archive.org/web/20230205074712/http://docs.carolinenoyer.fr/pdf/cnoyer-rapportdestage-maitrise-2004.pdf" title="Rapport de stage"><i class="fas fa-paperclip mr-5" aria-hidden="true"></i> Rapport de stage</a></p>',
            'logo' => 'stagemaitrise.png'],
        ['label' => 'nevotec', 'name' => 'Génération de sites Internet valides W3C', 'period' => 'De novembre 2006 à avril 2007', 'year' => 2006,
            'description' => '
<p><strong>Framework de génération de sites Internet permettant de produire des pages valides XHTML.</strong>
    <br>
    Projet professionnel réalisé pour la société Actifdesign.</p>
<ul class="missions">
    <li>Utilisation du langage <b>Java</b> pour la partie métier</li>
    <li>Utilisation de la spécification <b>J2ee</b> pour la génération des pages HTML</li>
    <li>Utilisation du langage <b>XML</b> pour le stockage des données</li>
</ul>',
            'logo' => 'nevotec.png'],
        ['label' => 'nevoprint', 'name' => 'Génération de fichiers PDF haute définition', 'period' => 'De février à novembre 2007', 'year' => 2007,
            'description' => '
<p><strong>Framework de génération de produits imprimés haute définition au format PDF.</strong>
    <br>
    Projet professionnel réalisé pour la société Actifdesign.</p>
<ul class="missions">
    <li>Utilisation du langage <b>Java</b> pour la partie métier</li>
    <li>Utilisation du langage <b>XML</b> pour le stockage des données</li>
    <li>Génération de documents PDF haute définition à l\'aide de bibliothèques Java</li>
</ul>',
            'logo' => 'nevoprint.png'],
        ['label' => 'randos', 'name' => 'Création graphique et développement', 'period' => 'Novembre 2007', 'year' => 2008,
            'description' => "Ce projet a pour but de valoriser les randonnées en Auvergne, en proposant des circuits de randonnées par le biais de photos, d'un bref résumé et d'avis sur les parcours.",
            'screenshots' => 'website-randos.png', 'logo' => 'randos.png'],
        ['label' => 'ttc', 'name' => 'Création graphique Site Internet', 'period' => 'Octobre 2010', 'year' => 2010,
            'description' => 'Création graphique du site Internet du BDE TeamTanesC.',
            'screenshots' => 'website-teamtanesc.png', 'logo' => 'ttc.png'],
        ['label' => 'creations', 'name' => 'Créations graphique', 'period' => 'Depuis 2012', 'year' => 2012,
            'description' => 'Réalisation de créations graphiques pour mon entourage : faire-parts, cartes de visite, logos',
            'screenshots' => 'fairepart-gus.jpg::fairepart-elea.jpg::fairepart-cf.jpg::plu2cloud-logo-verti.png::plugeekit-logo-verti.png::tradee-logo-vert.png', 'logo' => 'nine.png'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->arcadeTypesList as $type) {
            $arcadeType = new ArcadeType();
            $arcadeType->setLabel($type['label']);
            $arcadeType->setName($type['name']);
            $arcadeType->setPosition($type['position']);

            $manager->persist($arcadeType);
        }

        foreach ($this->companiesList as $item) {
            $company = new Company();
            $company->setLabel($item['label']);
            $company->setName($item['name']);
            $company->setCity($item['city']);
            $company->setDepartment($item['department']);
            if (!empty($item['url'])) {
                $company->setUrl($item['url']);
            }
            if (!empty($item['logo'])) {
                $company->setLogo($item['logo']);
            }

            $manager->persist($company);
            $this->addReference('company_'.$company->getLabel(), $company);
        }

        foreach ($this->creationTypesList as $type) {
            $creationType = new CreationType();
            $creationType->setLabel($type['label']);
            $creationType->setName($type['name']);
            $creationType->setPosition($type['position']);

            $manager->persist($creationType);
        }

        foreach ($this->photoTypesList as $type) {
            $photoType = new PhotoType();
            $photoType->setLabel($type['label']);
            $photoType->setName($type['name']);
            $photoType->setPosition($type['position']);

            $manager->persist($photoType);
        }

        foreach ($this->schoolsList as $item) {
            $school = new School();
            $school->setLabel($item['label']);
            $school->setName($item['name']);
            $school->setCity($item['city']);
            $school->setDepartment($item['department']);
            if (!empty($item['logo'])) {
                $school->setLogo($item['logo']);
            }

            $manager->persist($school);
            $this->addReference('school_'.$school->getLabel(), $school);
        }

        foreach ($this->skillTypesList as $type) {
            $skillType = new SkillType();
            $skillType->setLabel($type['label']);
            $skillType->setName($type['name']);
            $skillType->setLogo($type['logo']);
            $skillType->setPosition($type['position']);

            $manager->persist($skillType);
            $this->addReference('skilltype_'.$skillType->getLabel(), $skillType);
        }

        foreach ($this->skillsList as $item) {
            $skill = new Skill();
            $skill->setLabel($item['label']);
            $skill->setName($item['name']);
            $skill->setStartYear($item['startYear']);
            $skill->setEndYear($item['endYear']);
            $skill->setLevel($item['level']);
            $skill->setLogo($item['logo']);
            $skill->setPosition($item['position']);
            $skill->setSkillType($this->getReference('skilltype_'.$item['type']));
            $skill->setDisplay($item['display']);

            $manager->persist($skill);
            $this->addReference('skill_'.$skill->getLabel(), $skill);
        }

        foreach ($this->experiencesList as $item) {
            $experience = new Experience();
            $experience->setLabel($item['label']);
            $experience->setTitle($item['title']);
            $experience->setSubtitle($item['subtitle']);
            $experience->setDescription($item['description']);
            $experience->setStartDate(new \DateTime($item['startDate']));
            if (null !== $item['endDate']) {
                $experience->setEndDate(new \DateTime($item['endDate']));
            }

            $experience->setCompany($this->getReference('company_'.$item['company']));

            if (count($item['skills']) > 0) {
                foreach ($item['skills'] as $label) {
                    $experience->addSkill($this->getReference('skill_'.$label));
                }
            }

            $manager->persist($experience);
        }

        foreach ($this->educationsList as $item) {
            $education = new Education();
            $education->setLabel($item['label']);
            $education->setTitle($item['title']);
            $education->setYear($item['year']);
            $education->setDetails($item['details']);
            if (isset($item['speciality'])) {
                $education->setSpeciality($item['speciality']);
            }
            if (isset($item['mention'])) {
                $education->setMention($item['mention']);
            }
            $education->setType($item['type']);
            $education->setSchool($this->getReference('school_'.$item['school']));

            $manager->persist($education);
        }

        foreach ($this->projectsList as $item) {
            $project = new Project();
            $project->setLabel($item['label']);
            $project->setName($item['name']);
            $project->setPeriod($item['period']);
            $project->setYear($item['year']);
            $project->setDescription($item['description']);
            $project->setLogo($item['logo']);
            if (isset($item['screenshots'])) {
                $project->setScreenshots($item['screenshots']);
            }

            $manager->persist($project);
        }

        $manager->flush();
    }
}
