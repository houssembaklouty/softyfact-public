<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            // ============================================================
            // POST 1 — Comment choisir un logiciel de facturation
            // ============================================================
            [
                'slug' => 'comment-choisir-logiciel-facturation-tunisie',
                'title_fr' => 'Comment choisir un logiciel de facturation en Tunisie en 2026',
                'title_ar' => 'كيف تختار برنامج فوترة في تونس في 2026',
                'excerpt_fr' => 'Découvrez les critères essentiels pour choisir le bon logiciel de facturation adapté aux entreprises tunisiennes : conformité fiscale, simplicité et support local.',
                'excerpt_ar' => 'اكتشف المعايير الأساسية لاختيار برنامج الفوترة المناسب للشركات التونسية: التوافق الجبائي والبساطة والدعم المحلي.',
                'body_fr' => '<h2>Pourquoi un logiciel de facturation est devenu indispensable</h2>
<p>En Tunisie, la gestion manuelle de la facturation — avec des factures rédigées sur papier ou sur des fichiers Excel — est encore courante dans de nombreuses PME. Pourtant, cette approche comporte des risques considérables : erreurs de calcul de TVA, oubli du timbre fiscal, numérotation non séquentielle, et perte de documents lors des contrôles fiscaux.</p>
<p>Avec le renforcement des contrôles de l\'administration fiscale tunisienne et l\'arrivée prochaine de la <a href="/blog/facturation-electronique-tunisie-elfatoora">facturation électronique (El-Fatoora)</a>, disposer d\'un logiciel de facturation fiable n\'est plus un luxe — c\'est une nécessité. Un bon logiciel vous permet de gagner du temps, de réduire les erreurs et de rester en conformité avec la législation fiscale tunisienne.</p>
<p>En 2026, le marché propose de nombreuses solutions, mais toutes ne sont pas adaptées aux spécificités tunisiennes. Ce guide vous aide à identifier les critères qui comptent vraiment pour faire le bon choix.</p>

<h2>Les critères essentiels pour le marché tunisien</h2>

<h3>Conformité fiscale tunisienne</h3>
<p>C\'est le critère le plus important. Votre logiciel doit gérer correctement les taxes tunisiennes :</p>
<ul>
<li><strong>TVA à taux multiples</strong> : le taux normal de 19%, le taux réduit de 13% et le taux super-réduit de 7%. Chaque produit ou service peut avoir un taux différent, et le logiciel doit permettre de les configurer facilement. Pour en savoir plus, consultez notre <a href="/blog/guide-tva-tunisie">guide complet de la TVA en Tunisie</a>.</li>
<li><strong>FODEC (Fonds de Développement de la Compétitivité)</strong> : cette taxe de 1% s\'applique à certains produits industriels. Le logiciel doit permettre de l\'activer par produit et de la calculer automatiquement. Découvrez notre <a href="/blog/fodec-tunisie-guide">guide FODEC</a> pour plus de détails.</li>
<li><strong>Timbre fiscal</strong> : le droit de timbre de 1 DT s\'applique sur les factures payées en espèces. Un bon logiciel l\'ajoute automatiquement selon le mode de paiement.</li>
<li><strong>Retenue à la source</strong> : la gestion des taux de retenue (1,5%, 5%, 10%, 15%, 25%) et la génération des certificats de retenue sont essentielles pour les transactions B2B.</li>
</ul>

<h3>Gestion des documents commerciaux</h3>
<p>Un logiciel complet doit gérer l\'ensemble du cycle commercial :</p>
<ul>
<li>Devis (avec conversion en facture)</li>
<li>Bons de commande</li>
<li>Bons de livraison</li>
<li>Factures de vente et d\'achat</li>
<li>Avoirs (factures de retour)</li>
<li>Factures proforma</li>
</ul>
<p>La numérotation séquentielle obligatoire et la possibilité de personnaliser les modèles d\'impression sont également des fonctionnalités importantes.</p>

<h3>Simplicité d\'utilisation</h3>
<p>La réalité des PME tunisiennes est que le personnel n\'est pas toujours formé à l\'informatique. Le logiciel doit être intuitif, avec une interface claire en français (et idéalement en arabe). La courbe d\'apprentissage doit être courte : un comptable ou un gérant doit pouvoir créer sa première facture en moins de 5 minutes.</p>

<h3>Support local et réactivité</h3>
<p>Optez pour un éditeur qui propose un support en français et en arabe, avec des horaires compatibles avec le fuseau horaire tunisien. Un support WhatsApp ou téléphonique direct est un vrai plus par rapport à un simple système de tickets en anglais.</p>

<h3>Gestion du stock</h3>
<p>Pour les entreprises qui vendent des produits physiques, la gestion de stock intégrée est un critère décisif. Recherchez les fonctionnalités suivantes : suivi des quantités en temps réel, alertes de stock minimum, gestion multi-dépôts, et historique des mouvements.</p>

<h2>Version Bureau vs Version Cloud : comment choisir ?</h2>
<p>Les logiciels de facturation se déclinent en deux grandes catégories, chacune avec ses avantages :</p>

<h3>La version bureau (hors-ligne)</h3>
<p>La <a href="/product/offline">version bureau</a> s\'installe sur votre ordinateur et fonctionne sans connexion Internet. C\'est la solution idéale si :</p>
<ul>
<li>Vous travaillez dans une zone avec une connexion Internet instable</li>
<li>Vous préférez garder vos données en local pour des raisons de confidentialité</li>
<li>Vous souhaitez un paiement unique sans abonnement mensuel</li>
<li>Vous n\'avez pas besoin d\'accéder à vos données depuis plusieurs appareils</li>
</ul>

<h3>La version cloud (en ligne)</h3>
<p>La <a href="/product/online">version cloud</a> est accessible depuis n\'importe quel navigateur. Elle est recommandée si :</p>
<ul>
<li>Vous avez plusieurs utilisateurs ou points de vente</li>
<li>Vous souhaitez accéder à vos données depuis votre téléphone ou tablette</li>
<li>Vous voulez des sauvegardes automatiques sans vous en soucier</li>
<li>Vous préférez un abonnement mensuel léger plutôt qu\'un investissement initial</li>
</ul>
<p>Dans les deux cas, assurez-vous que le logiciel gère correctement les spécificités fiscales tunisiennes mentionnées plus haut.</p>

<h2>Les questions à poser avant d\'acheter</h2>
<p>Avant de vous engager, posez ces questions à l\'éditeur du logiciel :</p>
<ol>
<li><strong>Le logiciel gère-t-il la TVA à taux multiples (19%, 13%, 7%) ?</strong> Certains logiciels étrangers ne permettent qu\'un seul taux de TVA.</li>
<li><strong>Le FODEC et le timbre fiscal sont-ils intégrés ?</strong> Ces taxes spécifiques à la Tunisie sont souvent absentes des solutions internationales.</li>
<li><strong>Puis-je imprimer en français et en arabe ?</strong> La conformité légale exige souvent des documents bilingues.</li>
<li><strong>Y a-t-il un support en français ou en arabe ?</strong> Un support uniquement en anglais peut poser problème au quotidien.</li>
<li><strong>Propose-t-il la gestion des certificats de retenue à la source ?</strong> C\'est indispensable pour les entreprises qui travaillent avec le secteur public ou de grandes entreprises.</li>
<li><strong>Le logiciel sera-t-il compatible avec El-Fatoora ?</strong> La facturation électronique arrive en Tunisie, et votre logiciel doit être prêt.</li>
<li><strong>Existe-t-il une version d\'essai gratuite ?</strong> Toujours tester avant d\'acheter.</li>
<li><strong>Les mises à jour sont-elles incluses ?</strong> La législation fiscale évolue, et votre logiciel doit suivre.</li>
</ol>

<h2>Conclusion</h2>
<p>Le choix d\'un logiciel de facturation en Tunisie ne doit pas se faire uniquement sur le prix. La conformité fiscale, la simplicité d\'utilisation et le support local sont des critères tout aussi importants. Prenez le temps de tester plusieurs solutions, de vérifier qu\'elles gèrent les spécificités tunisiennes (TVA multi-taux, FODEC, timbre fiscal, retenue à la source), et de choisir celle qui correspond le mieux à la taille et aux besoins de votre entreprise.</p>
<p>SoftyFact propose une <a href="/product/offline">version bureau</a> et une <a href="/product/online">version cloud</a> spécialement conçues pour les entreprises tunisiennes, avec une conformité fiscale complète et un support local réactif.</p>',

                'body_ar' => '<h2>لماذا أصبح برنامج الفوترة ضرورة لا غنى عنها</h2>
<p>في تونس، لا تزال العديد من المؤسسات الصغرى والمتوسطة تعتمد على الفوترة اليدوية — عبر الورق أو ملفات Excel. لكن هذا الأسلوب ينطوي على مخاطر كبيرة: أخطاء في حساب الأداء على القيمة المضافة، نسيان معلوم الطابع الجبائي، ترقيم غير تسلسلي، وفقدان الوثائق أثناء المراقبات الجبائية.</p>
<p>مع تشديد رقابة الإدارة الجبائية التونسية واقتراب تطبيق <a href="/blog/facturation-electronique-tunisie-elfatoora">الفوترة الإلكترونية (الفاتورة)</a>، فإن امتلاك برنامج فوترة موثوق لم يعد رفاهية — بل أصبح ضرورة. البرنامج الجيد يوفر لك الوقت ويقلل الأخطاء ويضمن التوافق مع التشريعات الجبائية التونسية.</p>
<p>في 2026، يقدم السوق حلولاً عديدة، لكنها ليست كلها مناسبة للخصوصيات التونسية. هذا الدليل يساعدك على تحديد المعايير المهمة فعلاً لاتخاذ القرار الصحيح.</p>

<h2>المعايير الأساسية للسوق التونسي</h2>

<h3>التوافق الجبائي التونسي</h3>
<p>هذا هو المعيار الأهم. يجب أن يتعامل برنامجك بشكل صحيح مع الضرائب التونسية:</p>
<ul>
<li><strong>الأداء على القيمة المضافة بنسب متعددة</strong>: النسبة العادية 19%، النسبة المخفضة 13%، والنسبة المخفضة جداً 7%. لكل منتج أو خدمة نسبة مختلفة، ويجب أن يتيح البرنامج ضبطها بسهولة. لمعرفة المزيد، اطلع على <a href="/blog/guide-tva-tunisie">الدليل الشامل للأداء على القيمة المضافة في تونس</a>.</li>
<li><strong>FODEC (صندوق تطوير القدرة التنافسية)</strong>: هذه الضريبة بنسبة 1% تُطبق على بعض المنتجات الصناعية. يجب أن يتيح البرنامج تفعيلها حسب المنتج وحسابها تلقائياً. اكتشف <a href="/blog/fodec-tunisie-guide">دليل FODEC</a> لمزيد من التفاصيل.</li>
<li><strong>معلوم الطابع الجبائي</strong>: حق الطابع بقيمة 1 دينار يُطبق على الفواتير المدفوعة نقداً. البرنامج الجيد يضيفه تلقائياً حسب طريقة الدفع.</li>
<li><strong>الخصم من المورد</strong>: إدارة نسب الخصم (1,5%، 5%، 10%، 15%، 25%) وإصدار شهادات الخصم ضرورية للمعاملات بين المؤسسات.</li>
</ul>

<h3>إدارة الوثائق التجارية</h3>
<p>يجب أن يدير البرنامج الشامل كامل الدورة التجارية:</p>
<ul>
<li>عروض الأسعار (مع تحويلها إلى فواتير)</li>
<li>أوامر الشراء</li>
<li>وصولات التسليم</li>
<li>فواتير البيع والشراء</li>
<li>إشعارات الإرجاع (فواتير المرتجعات)</li>
<li>الفواتير الأولية</li>
</ul>
<p>الترقيم التسلسلي الإجباري وإمكانية تخصيص نماذج الطباعة هي أيضاً ميزات مهمة.</p>

<h3>سهولة الاستخدام</h3>
<p>واقع المؤسسات الصغرى والمتوسطة التونسية هو أن الموظفين ليسوا دائماً متمرسين في المعلوماتية. يجب أن يكون البرنامج بديهياً، بواجهة واضحة بالفرنسية (ومثالياً بالعربية). يجب أن يكون منحنى التعلم قصيراً: محاسب أو مدير يجب أن يتمكن من إنشاء فاتورته الأولى في أقل من 5 دقائق.</p>

<h3>الدعم المحلي والتجاوب</h3>
<p>اختر مزوداً يقدم دعماً بالفرنسية والعربية، بمواعيد متوافقة مع التوقيت التونسي. دعم عبر واتساب أو الهاتف المباشر يعتبر ميزة حقيقية مقارنة بنظام تذاكر بالإنجليزية فقط.</p>

<h3>إدارة المخزون</h3>
<p>بالنسبة للمؤسسات التي تبيع منتجات مادية، فإن إدارة المخزون المدمجة معيار حاسم. ابحث عن الميزات التالية: تتبع الكميات في الوقت الحقيقي، تنبيهات الحد الأدنى للمخزون، إدارة مستودعات متعددة، وسجل الحركات.</p>

<h2>نسخة مكتبية أم نسخة سحابية: كيف تختار؟</h2>
<p>تنقسم برامج الفوترة إلى فئتين رئيسيتين، لكل منهما مزاياها:</p>

<h3>النسخة المكتبية (بدون إنترنت)</h3>
<p><a href="/product/offline">النسخة المكتبية</a> تُثبت على حاسوبك وتعمل بدون اتصال بالإنترنت. إنها الحل المثالي إذا:</p>
<ul>
<li>كنت تعمل في منطقة باتصال إنترنت غير مستقر</li>
<li>كنت تفضل الحفاظ على بياناتك محلياً لأسباب تتعلق بالسرية</li>
<li>كنت تريد دفعة واحدة بدون اشتراك شهري</li>
<li>لا تحتاج للوصول إلى بياناتك من أجهزة متعددة</li>
</ul>

<h3>النسخة السحابية (عبر الإنترنت)</h3>
<p><a href="/product/online">النسخة السحابية</a> يمكن الوصول إليها من أي متصفح. يُنصح بها إذا:</p>
<ul>
<li>لديك عدة مستخدمين أو نقاط بيع</li>
<li>تريد الوصول إلى بياناتك من هاتفك أو جهازك اللوحي</li>
<li>تريد نسخاً احتياطية تلقائية دون القلق بشأنها</li>
<li>تفضل اشتراكاً شهرياً خفيفاً بدلاً من استثمار أولي كبير</li>
</ul>
<p>في كلتا الحالتين، تأكد من أن البرنامج يدير بشكل صحيح الخصوصيات الجبائية التونسية المذكورة أعلاه.</p>

<h2>الأسئلة التي يجب طرحها قبل الشراء</h2>
<p>قبل الالتزام، اطرح هذه الأسئلة على مزود البرنامج:</p>
<ol>
<li><strong>هل يدير البرنامج الأداء على القيمة المضافة بنسب متعددة (19%، 13%، 7%)؟</strong> بعض البرامج الأجنبية لا تسمح إلا بنسبة واحدة.</li>
<li><strong>هل FODEC ومعلوم الطابع الجبائي مدمجان؟</strong> هذه الضرائب الخاصة بتونس غالباً ما تكون غائبة عن الحلول الدولية.</li>
<li><strong>هل يمكنني الطباعة بالفرنسية والعربية؟</strong> التوافق القانوني يتطلب غالباً وثائق ثنائية اللغة.</li>
<li><strong>هل يوجد دعم بالفرنسية أو العربية؟</strong> دعم بالإنجليزية فقط قد يسبب مشاكل يومية.</li>
<li><strong>هل يقدم إدارة شهادات الخصم من المورد؟</strong> هذا ضروري للمؤسسات التي تتعامل مع القطاع العام أو المؤسسات الكبرى.</li>
<li><strong>هل سيكون البرنامج متوافقاً مع الفاتورة الإلكترونية؟</strong> الفوترة الإلكترونية قادمة إلى تونس، ويجب أن يكون برنامجك جاهزاً.</li>
<li><strong>هل توجد نسخة تجريبية مجانية؟</strong> دائماً جرّب قبل الشراء.</li>
<li><strong>هل التحديثات مشمولة؟</strong> التشريعات الجبائية تتطور، ويجب أن يواكبها برنامجك.</li>
</ol>

<h2>الخلاصة</h2>
<p>اختيار برنامج فوترة في تونس لا يجب أن يعتمد على السعر فقط. التوافق الجبائي وسهولة الاستخدام والدعم المحلي معايير بنفس الأهمية. خذ وقتك لتجربة عدة حلول والتأكد من أنها تدير الخصوصيات التونسية (أداء على القيمة المضافة بنسب متعددة، FODEC، معلوم الطابع الجبائي، الخصم من المورد)، واختر ما يناسب حجم واحتياجات مؤسستك.</p>
<p>SoftyFact يقدم <a href="/product/offline">نسخة مكتبية</a> و<a href="/product/online">نسخة سحابية</a> مصممتين خصيصاً للمؤسسات التونسية، مع توافق جبائي كامل ودعم محلي متجاوب.</p>',

                'meta_description_fr' => 'Guide 2026 pour choisir un logiciel de facturation en Tunisie. Critères clés : conformité TVA/FODEC, gestion stock, support local, prix.',
                'meta_description_ar' => 'دليل 2026 لاختيار برنامج فوترة في تونس. المعايير: التوافق مع TVA/FODEC، إدارة المخزون، الدعم المحلي.',
                'meta_keywords' => 'logiciel facturation tunisie, logiciel comptabilité tunisie, facturation PME tunisie, choisir logiciel facturation',
                'cover_image' => '/screen/Tableau de bord.png',
                'reading_time' => 8,
                'published_at' => '2026-01-15 10:00:00',
            ],

            // ============================================================
            // POST 2 — Guide complet de la TVA en Tunisie
            // ============================================================
            [
                'slug' => 'guide-tva-tunisie',
                'title_fr' => 'Guide complet de la TVA en Tunisie : taux, calcul et déclaration',
                'title_ar' => 'الدليل الشامل للأداء على القيمة المضافة في تونس: النسب والحساب والتصريح',
                'excerpt_fr' => 'Tout savoir sur la TVA en Tunisie : les taux en vigueur (19%, 13%, 7%), le calcul, la déclaration mensuelle et les erreurs à éviter.',
                'excerpt_ar' => 'كل ما تحتاج معرفته عن الأداء على القيمة المضافة في تونس: النسب المعمول بها والحساب والتصريح الشهري.',
                'body_fr' => '<h2>Qu\'est-ce que la TVA ?</h2>
<p>La TVA (Taxe sur la Valeur Ajoutée), appelée en arabe الأداء على القيمة المضافة, est un impôt indirect sur la consommation. Elle est collectée par les entreprises à chaque étape de la chaîne de production et de distribution, puis reversée à l\'État. En Tunisie, la TVA est régie par le Code de la TVA et constitue l\'une des principales sources de recettes fiscales du pays.</p>
<p>Le principe est simple : l\'entreprise facture la TVA à ses clients (TVA collectée), et déduit la TVA payée à ses fournisseurs (TVA déductible). La différence est reversée à l\'État. Si la TVA déductible est supérieure à la TVA collectée, l\'entreprise dispose d\'un crédit de TVA reportable.</p>
<p>Toute entreprise réalisant un chiffre d\'affaires supérieur au seuil légal est assujettie à la TVA et doit la facturer, la déclarer et la reverser mensuellement.</p>

<h2>Les taux de TVA en vigueur en Tunisie</h2>
<p>La Tunisie applique un système de TVA à taux multiples, ce qui en fait une particularité importante pour les logiciels de facturation. Voici les taux en vigueur :</p>

<h3>Taux normal : 19%</h3>
<p>C\'est le taux par défaut qui s\'applique à la majorité des biens et services. Il concerne notamment :</p>
<ul>
<li>Les produits manufacturés courants</li>
<li>Les services de conseil et d\'ingénierie</li>
<li>Les équipements électroniques et informatiques</li>
<li>Les services de télécommunications</li>
<li>Les prestations de restauration et d\'hôtellerie</li>
</ul>

<h3>Taux réduit : 13%</h3>
<p>Ce taux intermédiaire s\'applique à certaines catégories de biens et services, notamment :</p>
<ul>
<li>Certains services liés au tourisme</li>
<li>Certaines professions libérales</li>
<li>Les services informatiques sous certaines conditions</li>
<li>Certains produits de consommation courante réglementés</li>
</ul>

<h3>Taux super-réduit : 7%</h3>
<p>Ce taux préférentiel vise les produits et services de première nécessité :</p>
<ul>
<li>Les produits alimentaires de base (sucre, huile, farine, etc.)</li>
<li>Les produits pharmaceutiques</li>
<li>Les fournitures scolaires</li>
<li>Certains services de santé</li>
<li>Les transports de personnes</li>
</ul>

<h3>Exonération (0%)</h3>
<p>Certains secteurs bénéficient d\'une exonération totale de TVA :</p>
<ul>
<li>Les exportations</li>
<li>Certains services financiers</li>
<li>Les activités agricoles sous certaines conditions</li>
<li>Certaines opérations immobilières</li>
</ul>

<h2>Comment calculer la TVA</h2>
<p>Le calcul de la TVA en Tunisie suit des règles précises. Voici les formules essentielles :</p>

<h3>Calcul de la TVA à partir du montant HT</h3>
<p>La formule est simple :</p>
<ul>
<li><strong>Montant TVA</strong> = Montant HT × Taux de TVA</li>
<li><strong>Montant TTC</strong> = Montant HT + Montant TVA</li>
</ul>
<p><strong>Exemple :</strong> Un service à 1 000 DT HT avec TVA à 19% :</p>
<ul>
<li>TVA = 1 000 × 19% = 190 DT</li>
<li>TTC = 1 000 + 190 = 1 190 DT</li>
</ul>

<h3>Calcul du montant HT à partir du TTC</h3>
<p>Pour retrouver le HT à partir d\'un prix TTC :</p>
<ul>
<li><strong>Montant HT</strong> = Montant TTC ÷ (1 + Taux de TVA)</li>
</ul>
<p><strong>Exemple :</strong> Un produit à 595 DT TTC avec TVA à 19% :</p>
<ul>
<li>HT = 595 ÷ 1,19 = 500 DT</li>
<li>TVA = 595 - 500 = 95 DT</li>
</ul>

<h3>Factures avec taux multiples</h3>
<p>Lorsqu\'une facture contient des produits à des taux différents, la TVA doit être calculée séparément pour chaque taux. Le total de la TVA est la somme des TVA par taux. C\'est pourquoi un <a href="/blog/comment-choisir-logiciel-facturation-tunisie">bon logiciel de facturation</a> est indispensable pour éviter les erreurs.</p>

<h2>La déclaration mensuelle de TVA</h2>
<p>En Tunisie, la déclaration de TVA est mensuelle. Elle doit être déposée avant le 28 du mois suivant la période concernée (ou le 15 pour certaines catégories d\'entreprises). La déclaration se fait via le formulaire officiel et inclut :</p>
<ol>
<li><strong>TVA collectée</strong> : le total de la TVA facturée aux clients durant le mois, ventilé par taux.</li>
<li><strong>TVA déductible</strong> : le total de la TVA payée aux fournisseurs, ventilé par taux.</li>
<li><strong>TVA nette à payer</strong> : la différence entre TVA collectée et TVA déductible.</li>
<li><strong>Report de crédit</strong> : si la TVA déductible excède la collectée, le solde est reporté au mois suivant.</li>
</ol>
<p>La déclaration peut être effectuée en ligne sur la plateforme de l\'administration fiscale tunisienne. Un bon logiciel de facturation génère automatiquement un récapitulatif de TVA par période, facilitant considérablement cette tâche.</p>

<h2>Erreurs courantes à éviter</h2>
<p>Voici les erreurs les plus fréquentes que commettent les entreprises tunisiennes en matière de TVA :</p>
<ol>
<li><strong>Appliquer le mauvais taux</strong> : confondre les taux de 19%, 13% et 7% est une erreur classique. Vérifiez systématiquement le taux applicable à chaque produit ou service.</li>
<li><strong>Oublier la TVA sur les services</strong> : certains entrepreneurs pensent que seuls les produits physiques sont soumis à la TVA. Les services sont également taxables.</li>
<li><strong>Ne pas ventiler par taux</strong> : sur une facture contenant des produits à taux différents, la TVA doit être calculée et affichée par taux. Un total global est insuffisant.</li>
<li><strong>Retard de déclaration</strong> : le dépôt tardif entraîne des pénalités de retard. Configurez des rappels automatiques.</li>
<li><strong>Déduire une TVA non déductible</strong> : certaines dépenses (véhicules de tourisme, réceptions, etc.) ne donnent pas droit à déduction.</li>
<li><strong>Confondre TVA et timbre fiscal</strong> : le timbre fiscal de 1 DT n\'est pas une TVA. C\'est une taxe distincte qui s\'applique sur les factures payées en espèces.</li>
</ol>
<p>Un logiciel de facturation conforme aux normes tunisiennes élimine la plupart de ces erreurs en automatisant les calculs et en validant les données saisies.</p>',

                'body_ar' => '<h2>ما هو الأداء على القيمة المضافة؟</h2>
<p>الأداء على القيمة المضافة (TVA) هو ضريبة غير مباشرة على الاستهلاك. تجمعها المؤسسات في كل مرحلة من مراحل سلسلة الإنتاج والتوزيع، ثم تحولها للدولة. في تونس، يخضع الأداء على القيمة المضافة لمجلة الأداء على القيمة المضافة ويمثل أحد أهم مصادر الإيرادات الجبائية للبلاد.</p>
<p>المبدأ بسيط: تفوتر المؤسسة الأداء على القيمة المضافة لحرفائها (أداء محصّل)، وتخصم الأداء المدفوع لمزوديها (أداء قابل للخصم). الفارق يُحوّل للدولة. إذا تجاوز الأداء القابل للخصم الأداء المحصّل، تحصل المؤسسة على فائض أداء قابل للترحيل.</p>
<p>كل مؤسسة يتجاوز رقم معاملاتها الحد القانوني تخضع للأداء على القيمة المضافة ويجب عليها فوترته والتصريح به وتحويله شهرياً.</p>

<h2>نسب الأداء على القيمة المضافة المعمول بها في تونس</h2>
<p>تطبق تونس نظام أداء على القيمة المضافة بنسب متعددة، مما يجعله خصوصية مهمة لبرامج الفوترة. إليك النسب المعمول بها:</p>

<h3>النسبة العادية: 19%</h3>
<p>هي النسبة الافتراضية التي تُطبق على غالبية السلع والخدمات. تشمل بالخصوص:</p>
<ul>
<li>المنتجات المصنعة الشائعة</li>
<li>خدمات الاستشارة والهندسة</li>
<li>المعدات الإلكترونية والمعلوماتية</li>
<li>خدمات الاتصالات</li>
<li>خدمات المطاعم والفنادق</li>
</ul>

<h3>النسبة المخفضة: 13%</h3>
<p>تُطبق هذه النسبة الوسيطة على فئات معينة من السلع والخدمات، منها:</p>
<ul>
<li>بعض الخدمات المرتبطة بالسياحة</li>
<li>بعض المهن الحرة</li>
<li>الخدمات المعلوماتية في ظروف معينة</li>
<li>بعض المنتجات الاستهلاكية المنظمة</li>
</ul>

<h3>النسبة المخفضة جداً: 7%</h3>
<p>تستهدف هذه النسبة التفضيلية المنتجات والخدمات الأساسية:</p>
<ul>
<li>المواد الغذائية الأساسية (السكر، الزيت، الدقيق، إلخ)</li>
<li>المنتجات الصيدلانية</li>
<li>اللوازم المدرسية</li>
<li>بعض الخدمات الصحية</li>
<li>نقل الأشخاص</li>
</ul>

<h3>الإعفاء (0%)</h3>
<p>تستفيد بعض القطاعات من إعفاء كامل من الأداء على القيمة المضافة:</p>
<ul>
<li>التصدير</li>
<li>بعض الخدمات المالية</li>
<li>الأنشطة الفلاحية في ظروف معينة</li>
<li>بعض العمليات العقارية</li>
</ul>

<h2>كيفية حساب الأداء على القيمة المضافة</h2>
<p>يتبع حساب الأداء على القيمة المضافة في تونس قواعد دقيقة. إليك الصيغ الأساسية:</p>

<h3>حساب الأداء انطلاقاً من المبلغ دون أداء</h3>
<p>الصيغة بسيطة:</p>
<ul>
<li><strong>مبلغ الأداء</strong> = المبلغ دون أداء × نسبة الأداء</li>
<li><strong>المبلغ شاملاً الأداء</strong> = المبلغ دون أداء + مبلغ الأداء</li>
</ul>
<p><strong>مثال:</strong> خدمة بقيمة 1,000 دينار دون أداء بنسبة 19%:</p>
<ul>
<li>الأداء = 1,000 × 19% = 190 دينار</li>
<li>شامل الأداء = 1,000 + 190 = 1,190 دينار</li>
</ul>

<h3>حساب المبلغ دون أداء انطلاقاً من المبلغ الشامل</h3>
<p>لاسترجاع المبلغ دون أداء من سعر شامل للأداء:</p>
<ul>
<li><strong>المبلغ دون أداء</strong> = المبلغ شامل الأداء ÷ (1 + نسبة الأداء)</li>
</ul>
<p><strong>مثال:</strong> منتج بقيمة 595 دينار شامل الأداء بنسبة 19%:</p>
<ul>
<li>دون أداء = 595 ÷ 1.19 = 500 دينار</li>
<li>الأداء = 595 - 500 = 95 دينار</li>
</ul>

<h3>فواتير بنسب متعددة</h3>
<p>عندما تحتوي فاتورة على منتجات بنسب مختلفة، يجب حساب الأداء بشكل منفصل لكل نسبة. إجمالي الأداء هو مجموع الأداءات حسب النسبة. لهذا فإن <a href="/blog/comment-choisir-logiciel-facturation-tunisie">برنامج فوترة جيد</a> ضروري لتجنب الأخطاء.</p>

<h2>التصريح الشهري بالأداء على القيمة المضافة</h2>
<p>في تونس، التصريح بالأداء على القيمة المضافة شهري. يجب إيداعه قبل 28 من الشهر الموالي للفترة المعنية (أو 15 لبعض فئات المؤسسات). يتم التصريح عبر المطبوعة الرسمية ويشمل:</p>
<ol>
<li><strong>الأداء المحصّل</strong>: إجمالي الأداء المفوتر للحرفاء خلال الشهر، موزعاً حسب النسب.</li>
<li><strong>الأداء القابل للخصم</strong>: إجمالي الأداء المدفوع للمزودين، موزعاً حسب النسب.</li>
<li><strong>صافي الأداء الواجب دفعه</strong>: الفارق بين الأداء المحصّل والأداء القابل للخصم.</li>
<li><strong>ترحيل الفائض</strong>: إذا تجاوز الأداء القابل للخصم المحصّل، يُرحّل الرصيد إلى الشهر الموالي.</li>
</ol>
<p>يمكن إجراء التصريح عبر الإنترنت على منصة الإدارة الجبائية التونسية. برنامج فوترة جيد يُنشئ تلقائياً ملخصاً للأداء حسب الفترة، مما يسهل هذه المهمة كثيراً.</p>

<h2>الأخطاء الشائعة التي يجب تجنبها</h2>
<p>إليك الأخطاء الأكثر شيوعاً التي ترتكبها المؤسسات التونسية في مجال الأداء على القيمة المضافة:</p>
<ol>
<li><strong>تطبيق النسبة الخاطئة</strong>: الخلط بين نسب 19% و13% و7% خطأ شائع. تحقق دائماً من النسبة المطبقة على كل منتج أو خدمة.</li>
<li><strong>نسيان الأداء على الخدمات</strong>: يعتقد بعض رجال الأعمال أن المنتجات المادية فقط هي الخاضعة للأداء. الخدمات أيضاً خاضعة للضريبة.</li>
<li><strong>عدم التوزيع حسب النسب</strong>: في فاتورة تحتوي منتجات بنسب مختلفة، يجب حساب وعرض الأداء حسب كل نسبة. إجمالي واحد غير كافٍ.</li>
<li><strong>التأخر في التصريح</strong>: الإيداع المتأخر يؤدي إلى غرامات تأخير. اضبط تذكيرات تلقائية.</li>
<li><strong>خصم أداء غير قابل للخصم</strong>: بعض النفقات (سيارات النزهة، الحفلات، إلخ) لا تمنح حق الخصم.</li>
<li><strong>الخلط بين الأداء على القيمة المضافة ومعلوم الطابع الجبائي</strong>: معلوم الطابع بقيمة 1 دينار ليس أداءً على القيمة المضافة. إنها ضريبة منفصلة تُطبق على الفواتير المدفوعة نقداً.</li>
</ol>
<p>برنامج فوترة متوافق مع المعايير التونسية يزيل معظم هذه الأخطاء بأتمتة الحسابات والتحقق من البيانات المُدخلة.</p>',

                'meta_description_fr' => 'Guide complet de la TVA en Tunisie 2026 : taux 19%, 13%, 7%, calcul, déclaration mensuelle. Tout ce que les PME doivent savoir.',
                'meta_description_ar' => 'الدليل الشامل للأداء على القيمة المضافة في تونس 2026: النسب 19%، 13%، 7%، الحساب والتصريح الشهري.',
                'meta_keywords' => 'TVA tunisie, taux TVA tunisie 2026, calcul TVA tunisie, déclaration TVA tunisie',
                'cover_image' => '/screen/Gestion des factures.png',
                'reading_time' => 7,
                'published_at' => '2026-01-28 10:00:00',
            ],

            // ============================================================
            // POST 3 — FODEC en Tunisie
            // ============================================================
            [
                'slug' => 'fodec-tunisie-guide',
                'title_fr' => 'FODEC en Tunisie : tout savoir sur cette taxe',
                'title_ar' => 'FODEC في تونس: كل ما تحتاج معرفته عن هذه الضريبة',
                'excerpt_fr' => 'Le FODEC (Fonds de Développement de la Compétitivité) est une taxe de 1% en Tunisie. Découvrez son fonctionnement et comment l\'intégrer dans vos factures.',
                'excerpt_ar' => 'FODEC (صندوق تطوير القدرة التنافسية) هو ضريبة بنسبة 1% في تونس. اكتشف كيفية عملها وإدراجها في فواتيرك.',
                'body_fr' => '<h2>Définition et objectif du FODEC</h2>
<p>Le FODEC — Fonds de Développement de la Compétitivité Industrielle — est un fonds créé par l\'État tunisien pour soutenir la modernisation et la mise à niveau du tissu industriel national. Financé par une taxe parafiscale prélevée sur certains produits, il vise à renforcer la compétitivité des entreprises tunisiennes face à la concurrence internationale.</p>
<p>La contribution au FODEC est obligatoire pour les produits concernés. Elle est intégrée dans la facture de vente et collectée par le fabricant ou l\'importateur, puis reversée à l\'État. Pour les entreprises tunisiennes, bien comprendre cette taxe et l\'intégrer correctement dans leurs factures est essentiel pour rester en conformité.</p>
<p>Le FODEC s\'inscrit dans la politique économique tunisienne de mise à niveau industrielle, initiée dans les années 1990 dans le cadre des accords de libre-échange avec l\'Union européenne.</p>

<h2>Taux applicable</h2>
<p>Le taux du FODEC est fixé à <strong>1%</strong> du prix de vente hors taxes (HT). Ce taux est uniforme et s\'applique de la même manière à tous les produits concernés, sans distinction de catégorie.</p>
<p>Le calcul est simple :</p>
<ul>
<li><strong>Montant FODEC</strong> = Prix de vente HT × 1%</li>
</ul>
<p><strong>Exemple concret :</strong></p>
<p>Un produit industriel vendu à 500 DT HT :</p>
<ul>
<li>FODEC = 500 × 1% = 5 DT</li>
<li>Base TVA = 500 + 5 = 505 DT</li>
<li>TVA (19%) = 505 × 19% = 95,95 DT</li>
<li>Total TTC = 505 + 95,95 = 600,95 DT</li>
</ul>
<p><strong>Point important :</strong> le FODEC est intégré dans la base de calcul de la TVA. Autrement dit, la TVA se calcule sur le montant HT majoré du FODEC. C\'est un point crucial que de nombreuses entreprises oublient, ce qui entraîne des erreurs dans leurs factures.</p>

<h2>Produits concernés par le FODEC</h2>
<p>Le FODEC ne s\'applique pas à tous les produits. Il concerne principalement les produits industriels fabriqués localement ou importés. La liste des produits soumis au FODEC est définie par décret et mise à jour périodiquement. Les grandes catégories incluent :</p>
<ul>
<li><strong>Produits agroalimentaires transformés</strong> : conserves, boissons, produits laitiers industriels, confiseries</li>
<li><strong>Matériaux de construction</strong> : ciment, céramique, briques, produits en verre</li>
<li><strong>Produits chimiques</strong> : détergents, peintures, produits d\'entretien</li>
<li><strong>Textiles et habillement</strong> : vêtements, tissus, articles en cuir</li>
<li><strong>Produits mécaniques et électriques</strong> : appareils électroménagers, équipements mécaniques</li>
<li><strong>Emballages</strong> : cartons, emballages plastiques</li>
</ul>
<p>En revanche, certains produits sont exonérés du FODEC, notamment les produits agricoles non transformés, les médicaments et certains produits de première nécessité. En cas de doute, consultez la nomenclature douanière ou rapprochez-vous de votre comptable.</p>

<h2>Comment intégrer le FODEC dans vos factures</h2>
<p>L\'intégration correcte du FODEC dans une facture nécessite de respecter un ordre de calcul précis. Voici les étapes :</p>
<ol>
<li><strong>Calculer le montant HT</strong> de chaque ligne de produit (quantité × prix unitaire HT).</li>
<li><strong>Appliquer le FODEC</strong> sur les produits concernés : Montant HT × 1%.</li>
<li><strong>Calculer la base de TVA</strong> : Montant HT + FODEC.</li>
<li><strong>Appliquer la TVA</strong> sur cette base (19%, 13% ou 7% selon le produit).</li>
<li><strong>Ajouter le timbre fiscal</strong> de 1 DT si le paiement est en espèces.</li>
<li><strong>Calculer le total TTC</strong>.</li>
</ol>
<p>Sur la facture imprimée, le FODEC doit apparaître comme une ligne distincte, clairement identifiée. Les mentions obligatoires incluent :</p>
<ul>
<li>La désignation « FODEC » ou « Contribution FODEC »</li>
<li>Le taux appliqué (1%)</li>
<li>Le montant du FODEC</li>
</ul>
<p>Pour en savoir plus sur les mentions obligatoires d\'une facture en Tunisie, consultez notre guide sur <a href="/blog/creer-facture-conforme-tunisie">comment créer une facture conforme</a>.</p>

<h2>Automatisation avec un logiciel de facturation</h2>
<p>Gérer manuellement le FODEC est source d\'erreurs, surtout quand une entreprise vend à la fois des produits soumis et des produits non soumis au FODEC. Les erreurs les plus courantes sont :</p>
<ul>
<li>Oublier d\'appliquer le FODEC sur un produit concerné</li>
<li>Calculer la TVA avant d\'ajouter le FODEC (au lieu de l\'inverse)</li>
<li>Appliquer le FODEC sur des produits exonérés</li>
</ul>
<p>Un logiciel de facturation adapté au marché tunisien automatise entièrement ce processus. Avec la <a href="/product/offline">version bureau de SoftyFact</a>, vous pouvez :</p>
<ul>
<li>Activer ou désactiver le FODEC produit par produit dans votre catalogue</li>
<li>Le logiciel calcule automatiquement le FODEC sur les produits concernés</li>
<li>La TVA est calculée sur la bonne base (HT + FODEC)</li>
<li>Le FODEC apparaît clairement sur la facture imprimée</li>
<li>Les rapports récapitulatifs incluent le total du FODEC collecté par période</li>
</ul>
<p>Cette automatisation élimine les erreurs de calcul et vous fait gagner un temps précieux, surtout si vous gérez un catalogue de produits important avec des règles fiscales variées.</p>
<p>En résumé, le FODEC est une taxe simple dans son principe (1% sur le HT des produits concernés), mais son intégration correcte dans les factures requiert de la rigueur. Un logiciel de facturation conforme aux normes tunisiennes est le meilleur moyen de garantir cette conformité au quotidien.</p>',

                'body_ar' => '<h2>تعريف FODEC وأهدافه</h2>
<p>FODEC — صندوق تطوير القدرة التنافسية الصناعية — هو صندوق أنشأته الدولة التونسية لدعم تحديث وتأهيل النسيج الصناعي الوطني. يُموّل بضريبة شبه جبائية تُفرض على منتجات معينة، ويهدف إلى تعزيز تنافسية المؤسسات التونسية في مواجهة المنافسة الدولية.</p>
<p>المساهمة في FODEC إجبارية على المنتجات المعنية. تُدمج في فاتورة البيع ويجمعها المصنّع أو المورّد، ثم تُحوّل للدولة. بالنسبة للمؤسسات التونسية، فإن فهم هذه الضريبة وإدراجها بشكل صحيح في فواتيرها أمر أساسي للحفاظ على التوافق الجبائي.</p>
<p>يندرج FODEC ضمن السياسة الاقتصادية التونسية للتأهيل الصناعي، التي انطلقت في التسعينيات في إطار اتفاقيات التبادل الحر مع الاتحاد الأوروبي.</p>

<h2>النسبة المطبقة</h2>
<p>نسبة FODEC محددة بـ <strong>1%</strong> من سعر البيع دون أداء. هذه النسبة موحدة وتُطبق بنفس الطريقة على جميع المنتجات المعنية، دون تمييز بين الفئات.</p>
<p>الحساب بسيط:</p>
<ul>
<li><strong>مبلغ FODEC</strong> = سعر البيع دون أداء × 1%</li>
</ul>
<p><strong>مثال عملي:</strong></p>
<p>منتج صناعي يُباع بـ 500 دينار دون أداء:</p>
<ul>
<li>FODEC = 500 × 1% = 5 دينار</li>
<li>قاعدة الأداء على القيمة المضافة = 500 + 5 = 505 دينار</li>
<li>الأداء على القيمة المضافة (19%) = 505 × 19% = 95.95 دينار</li>
<li>الإجمالي شامل الأداء = 505 + 95.95 = 600.95 دينار</li>
</ul>
<p><strong>نقطة مهمة:</strong> يُدمج FODEC في قاعدة حساب الأداء على القيمة المضافة. بمعنى آخر، يُحسب الأداء على المبلغ دون أداء مُضافاً إليه FODEC. هذه نقطة حاسمة تنساها العديد من المؤسسات، مما يؤدي إلى أخطاء في فواتيرها.</p>

<h2>المنتجات المعنية بـ FODEC</h2>
<p>لا يُطبق FODEC على جميع المنتجات. يهم أساساً المنتجات الصناعية المصنعة محلياً أو المستوردة. قائمة المنتجات الخاضعة لـ FODEC محددة بأمر وتُحدّث دورياً. الفئات الكبرى تشمل:</p>
<ul>
<li><strong>المنتجات الغذائية المصنعة</strong>: معلبات، مشروبات، منتجات ألبان صناعية، حلويات</li>
<li><strong>مواد البناء</strong>: إسمنت، سيراميك، آجر، منتجات زجاجية</li>
<li><strong>المنتجات الكيميائية</strong>: منظفات، دهانات، منتجات صيانة</li>
<li><strong>النسيج والملابس</strong>: ألبسة، أقمشة، منتجات جلدية</li>
<li><strong>المنتجات الميكانيكية والكهربائية</strong>: أجهزة كهرومنزلية، معدات ميكانيكية</li>
<li><strong>التغليف</strong>: كرتون، تغليف بلاستيكي</li>
</ul>
<p>في المقابل، بعض المنتجات معفاة من FODEC، خاصة المنتجات الفلاحية غير المصنعة والأدوية وبعض المنتجات الأساسية. في حالة الشك، راجع التسمية الديوانية أو استشر محاسبك.</p>

<h2>كيفية إدراج FODEC في فواتيرك</h2>
<p>يتطلب الإدراج الصحيح لـ FODEC في الفاتورة احترام ترتيب حساب دقيق. إليك المراحل:</p>
<ol>
<li><strong>حساب المبلغ دون أداء</strong> لكل سطر منتج (الكمية × السعر الوحدوي دون أداء).</li>
<li><strong>تطبيق FODEC</strong> على المنتجات المعنية: المبلغ دون أداء × 1%.</li>
<li><strong>حساب قاعدة الأداء على القيمة المضافة</strong>: المبلغ دون أداء + FODEC.</li>
<li><strong>تطبيق الأداء على القيمة المضافة</strong> على هذه القاعدة (19% أو 13% أو 7% حسب المنتج).</li>
<li><strong>إضافة معلوم الطابع الجبائي</strong> بقيمة 1 دينار إذا كان الدفع نقداً.</li>
<li><strong>حساب الإجمالي شامل الأداء</strong>.</li>
</ol>
<p>في الفاتورة المطبوعة، يجب أن يظهر FODEC كسطر منفصل ومحدد بوضوح. البيانات الإجبارية تشمل:</p>
<ul>
<li>التسمية « FODEC » أو « مساهمة FODEC »</li>
<li>النسبة المطبقة (1%)</li>
<li>مبلغ FODEC</li>
</ul>
<p>لمعرفة المزيد عن البيانات الإجبارية للفاتورة في تونس، اطلع على دليلنا حول <a href="/blog/creer-facture-conforme-tunisie">كيفية إنشاء فاتورة مطابقة</a>.</p>

<h2>الأتمتة باستخدام برنامج فوترة</h2>
<p>إدارة FODEC يدوياً مصدر للأخطاء، خاصة عندما تبيع المؤسسة منتجات خاضعة ومنتجات غير خاضعة لـ FODEC في آن واحد. الأخطاء الأكثر شيوعاً هي:</p>
<ul>
<li>نسيان تطبيق FODEC على منتج معني</li>
<li>حساب الأداء على القيمة المضافة قبل إضافة FODEC (بدلاً من العكس)</li>
<li>تطبيق FODEC على منتجات معفاة</li>
</ul>
<p>برنامج فوترة مكيّف للسوق التونسي يؤتمت هذه العملية بالكامل. مع <a href="/product/offline">النسخة المكتبية من SoftyFact</a>، يمكنك:</p>
<ul>
<li>تفعيل أو تعطيل FODEC لكل منتج على حدة في قائمة منتجاتك</li>
<li>البرنامج يحسب تلقائياً FODEC على المنتجات المعنية</li>
<li>يُحسب الأداء على القيمة المضافة على القاعدة الصحيحة (دون أداء + FODEC)</li>
<li>يظهر FODEC بوضوح على الفاتورة المطبوعة</li>
<li>التقارير التلخيصية تتضمن إجمالي FODEC المحصّل حسب الفترة</li>
</ul>
<p>هذه الأتمتة تزيل أخطاء الحساب وتوفر لك وقتاً ثميناً، خاصة إذا كنت تدير قائمة منتجات كبيرة بقواعد جبائية متنوعة.</p>
<p>باختصار، FODEC ضريبة بسيطة في مبدئها (1% على المبلغ دون أداء للمنتجات المعنية)، لكن إدراجها الصحيح في الفواتير يتطلب دقة. برنامج فوترة متوافق مع المعايير التونسية هو أفضل وسيلة لضمان هذا التوافق يومياً.</p>',

                'meta_description_fr' => 'FODEC en Tunisie : taux de 1%, produits concernés, calcul et intégration dans vos factures. Guide pratique pour PME.',
                'meta_description_ar' => 'FODEC في تونس: نسبة 1%، المنتجات المعنية، الحساب والإدراج في فواتيرك. دليل عملي للمؤسسات.',
                'meta_keywords' => 'FODEC tunisie, taxe FODEC, FODEC calcul, fonds développement compétitivité tunisie',
                'cover_image' => '/screen/ajout-produit.png',
                'reading_time' => 6,
                'published_at' => '2026-02-05 10:00:00',
            ],

            // ============================================================

            // ============================================================
            // POST 4 — Déclaration TEJ
            // ============================================================
            [
                'slug' => 'declaration-tej-guide-pratique',
                'title_fr' => 'Déclaration TEJ : guide pratique pour les entreprises tunisiennes',
                'title_ar' => 'تصريح TEJ: دليل عملي للمؤسسات التونسية',
                'excerpt_fr' => 'Guide pratique pour comprendre et réaliser la déclaration TEJ en Tunisie : étapes, plateforme et erreurs à éviter.',
                'excerpt_ar' => 'دليل عملي لفهم وإنجاز تصريح TEJ في تونس: المراحل والمنصة والأخطاء الشائعة.',
                'body_fr' => '<h2>Qu\'est-ce que la déclaration TEJ ?</h2>
<p>La <strong>déclaration TEJ</strong> (Télé-déclaration par Échange de données informatisé) est le système électronique mis en place par la <strong>Direction Générale des Impôts (DGI)</strong> en Tunisie pour permettre aux entreprises et aux professionnels de déposer leurs déclarations de <a href="/blog/retenue-source-tunisie-guide">retenue à la source</a> de manière dématérialisée. Ce dispositif s\'inscrit dans la stratégie de modernisation de l\'administration fiscale tunisienne, visant à simplifier les obligations déclaratives et à réduire les déplacements aux bureaux de contrôle des impôts.</p>
<p>Concrètement, la plateforme TEJ permet de transmettre par voie électronique les données relatives aux retenues effectuées sur les paiements versés aux fournisseurs, prestataires de services, salariés et autres bénéficiaires. Elle remplace progressivement le dépôt physique des déclarations mensuelles et permet un suivi en temps réel de l\'état des déclarations soumises.</p>
<p>Le cadre juridique de la télé-déclaration est défini par le <strong>Code des Droits et Procédures Fiscaux (CDPF)</strong> et les notes communes émises par la DGI, qui fixent les modalités techniques et les délais de dépôt.</p>
<h2>Qui est concerné par la déclaration TEJ ?</h2>
<p>La déclaration TEJ concerne un large éventail d\'acteurs économiques en Tunisie :</p>
<ul>
<li><strong>Les personnes morales</strong> (sociétés, associations, établissements publics) soumises à l\'obligation de retenue à la source sur les paiements qu\'elles effectuent.</li>
<li><strong>Les personnes physiques</strong> soumises au régime réel d\'imposition qui effectuent des retenues à la source au titre de leurs activités professionnelles.</li>
<li><strong>Les établissements et entreprises publics</strong> tenus de retenir l\'impôt à la source sur les montants versés à leurs fournisseurs et prestataires.</li>
<li><strong>Les administrations publiques</strong> dans le cadre des marchés publics et des paiements aux prestataires.</li>
</ul>
<p>En pratique, toute entité qui effectue des paiements soumis à la <a href="/blog/retenue-source-tunisie-guide">retenue à la source</a> — que ce soit au taux de 1%, 1,5%, 3%, 5%, 10%, 15%, 20% ou 25% selon la nature de l\'opération — est tenue de déposer sa déclaration via la plateforme TEJ dans les délais impartis.</p>
<h2>Les étapes de la déclaration TEJ</h2>
<p>Le processus de dépôt d\'une déclaration TEJ se déroule en plusieurs étapes clairement définies :</p>
<ol>
<li><strong>Préparation des données :</strong> Rassemblez l\'ensemble des factures et paiements effectués au cours de la période concernée. Identifiez les montants bruts versés, les taux de retenue applicables et les montants nets payés à chaque bénéficiaire.</li>
<li><strong>Connexion à la plateforme :</strong> Accédez au portail de la DGI et authentifiez-vous avec vos identifiants (matricule fiscal, mot de passe et éventuellement certificat électronique).</li>
<li><strong>Saisie ou importation des données :</strong> Renseignez les informations relatives à chaque bénéficiaire : identifiant fiscal, nom ou raison sociale, nature du paiement, montant brut, taux de retenue et montant retenu. La plateforme permet également l\'importation de fichiers au format structuré (XML ou CSV).</li>
<li><strong>Vérification et validation :</strong> Contrôlez la cohérence des données saisies. La plateforme effectue des vérifications automatiques et signale les éventuelles anomalies (identifiants fiscaux invalides, montants incohérents, etc.).</li>
<li><strong>Soumission de la déclaration :</strong> Une fois les données validées, soumettez la déclaration. Un accusé de réception électronique est généré, attestant du dépôt dans les délais.</li>
<li><strong>Paiement de l\'impôt :</strong> Procédez au paiement des montants retenus via les moyens de paiement acceptés (virement bancaire, télépaiement).</li>
</ol>
<h2>Plateforme et accès</h2>
<p>La plateforme TEJ est accessible via le <strong>portail officiel de la Direction Générale des Impôts</strong> à l\'adresse <strong>www.impots.finances.gov.tn</strong>. Pour y accéder, vous devez préalablement :</p>
<ul>
<li>Disposer d\'un <strong>matricule fiscal</strong> valide et à jour.</li>
<li>Créer un <strong>compte utilisateur</strong> sur le portail de la DGI si ce n\'est pas déjà fait.</li>
<li>Obtenir, le cas échéant, un <strong>certificat électronique</strong> délivré par l\'Agence Nationale de Certification Électronique (ANCE) pour sécuriser les échanges.</li>
</ul>
<p>Il est recommandé d\'utiliser un navigateur récent et de vérifier que les paramètres de sécurité permettent l\'accès au portail. En cas de difficulté technique, la DGI met à disposition un service d\'assistance accessible par téléphone et par courriel.</p>
<h2>Certificats de retenue à la source</h2>
<p>Lors de chaque retenue effectuée, l\'entreprise est tenue de délivrer au bénéficiaire un <strong>certificat de retenue à la source</strong>. Ce document est essentiel car il permet au bénéficiaire de justifier les retenues subies et de les imputer sur son propre impôt à payer.</p>
<p>Le certificat de retenue doit obligatoirement mentionner :</p>
<ul>
<li>L\'identité et le matricule fiscal du retenu et du débiteur.</li>
<li>La nature et le montant brut du paiement.</li>
<li>Le taux de retenue appliqué et le montant retenu.</li>
<li>La date du paiement et la période concernée.</li>
</ul>
<p>La plateforme TEJ facilite la génération de ces certificats en permettant leur édition directement depuis le système après la soumission de la déclaration. Il est impératif de conserver ces certificats pendant une durée minimale de <strong>10 ans</strong> conformément aux obligations légales.</p>
<h2>Erreurs courantes à éviter</h2>
<p>De nombreuses entreprises commettent des erreurs lors du dépôt de leur déclaration TEJ. Voici les plus fréquentes :</p>
<ul>
<li><strong>Retard de dépôt :</strong> La déclaration doit être déposée dans les <strong>28 premiers jours</strong> du mois suivant celui au cours duquel les retenues ont été effectuées. Tout retard expose à des pénalités de retard calculées à 0,75% par mois.</li>
<li><strong>Erreurs dans les identifiants fiscaux :</strong> La saisie d\'un matricule fiscal erroné ou incomplet entraîne le rejet de la ligne concernée. Vérifiez systématiquement les identifiants de vos fournisseurs.</li>
<li><strong>Application du mauvais taux :</strong> Le taux de retenue varie selon la nature de la prestation ou du paiement. Confondre les taux (par exemple, appliquer 3% au lieu de 1,5%) peut engendrer des redressements fiscaux.</li>
<li><strong>Omission de bénéficiaires :</strong> Tous les paiements soumis à retenue doivent figurer dans la déclaration, y compris les paiements de faible montant.</li>
<li><strong>Non-délivrance des certificats :</strong> Le défaut de remise des certificats de retenue aux bénéficiaires constitue une infraction sanctionnée par la loi.</li>
</ul>
<h2>Comment SoftyFact simplifie le processus</h2>
<p>Gérer manuellement les retenues à la source et les déclarations TEJ peut s\'avérer chronophage et source d\'erreurs. C\'est là qu\'intervient <a href="/product/offline">SoftyFact Bureau</a>, votre logiciel de facturation conçu spécifiquement pour les entreprises tunisiennes.</p>
<p>Avec <a href="/product/offline">SoftyFact Bureau</a>, vous bénéficiez de :</p>
<ul>
<li><strong>Calcul automatique des retenues :</strong> Le logiciel applique automatiquement le bon taux de <a href="/blog/retenue-source-tunisie-guide">retenue à la source</a> selon la nature de chaque transaction.</li>
<li><strong>Génération des certificats :</strong> Éditez vos certificats de retenue en un clic, conformes aux exigences légales.</li>
<li><strong>Export compatible TEJ :</strong> Exportez vos données de retenue dans un format directement importable sur la plateforme TEJ, éliminant ainsi les ressaisies manuelles.</li>
<li><strong>Tableau de bord fiscal :</strong> Suivez en temps réel l\'état de vos retenues, les montants à déclarer et les échéances à respecter.</li>
</ul>
<p>En automatisant ces tâches, <a href="/product/offline">SoftyFact Bureau</a> vous permet de gagner un temps précieux, de réduire les risques d\'erreur et de rester en conformité avec la législation fiscale tunisienne. Concentrez-vous sur votre activité principale et laissez SoftyFact s\'occuper de vos obligations déclaratives.</p>',
                'body_ar' => '<h2>ما هو التصريح TEJ؟</h2>
<p>التصريح <strong>TEJ</strong> (التصريح الإلكتروني عبر التبادل الإلكتروني للبيانات) هو النظام الإلكتروني الذي أنشأته <strong>الإدارة العامة للأداءات</strong> في تونس لتمكين المؤسسات والمهنيين من إيداع تصريحاتهم المتعلقة بـ<a href="/blog/retenue-source-tunisie-guide">الخصم من المورد</a> بطريقة إلكترونية. يندرج هذا النظام ضمن استراتيجية تحديث الإدارة الجبائية التونسية، بهدف تبسيط الالتزامات التصريحية وتقليل التنقلات إلى مكاتب مراقبة الأداءات.</p>
<p>عمليًا، تتيح منصة TEJ إرسال البيانات المتعلقة بالمبالغ المخصومة من المدفوعات المقدمة للموردين ومقدمي الخدمات والأجراء وغيرهم من المستفيدين بطريقة إلكترونية. وهي تحل تدريجيًا محل الإيداع الورقي للتصريحات الشهرية وتتيح متابعة فورية لحالة التصريحات المقدمة.</p>
<p>يُحدد الإطار القانوني للتصريح الإلكتروني بموجب <strong>مجلة الحقوق والإجراءات الجبائية</strong> والمذكرات العامة الصادرة عن الإدارة العامة للأداءات، التي تحدد الشروط التقنية وآجال الإيداع.</p>
<h2>من هو المعني بالتصريح TEJ؟</h2>
<p>يشمل التصريح TEJ مجموعة واسعة من الفاعلين الاقتصاديين في تونس:</p>
<ul>
<li><strong>الأشخاص المعنويون</strong> (شركات، جمعيات، مؤسسات عمومية) الخاضعون لالتزام الخصم من المورد على المدفوعات التي يقومون بها.</li>
<li><strong>الأشخاص الطبيعيون</strong> الخاضعون لنظام الأداء الحقيقي الذين يقومون بخصومات من المورد في إطار أنشطتهم المهنية.</li>
<li><strong>المؤسسات والمنشآت العمومية</strong> الملزمة بخصم الأداء من المورد على المبالغ المدفوعة لمورديها ومقدمي خدماتها.</li>
<li><strong>الإدارات العمومية</strong> في إطار الصفقات العمومية والمدفوعات لمقدمي الخدمات.</li>
</ul>
<p>عمليًا، كل كيان يقوم بمدفوعات خاضعة لـ<a href="/blog/retenue-source-tunisie-guide">الخصم من المورد</a> — سواء بنسبة 1% أو 1.5% أو 3% أو 5% أو 10% أو 15% أو 20% أو 25% حسب طبيعة العملية — ملزم بإيداع تصريحه عبر منصة TEJ في الآجال المحددة.</p>
<h2>مراحل التصريح TEJ</h2>
<p>تتم عملية إيداع تصريح TEJ عبر عدة مراحل محددة بوضوح:</p>
<ol>
<li><strong>إعداد البيانات:</strong> اجمع كل الفواتير والمدفوعات التي تمت خلال الفترة المعنية. حدد المبالغ الإجمالية المدفوعة ونسب الخصم المطبقة والمبالغ الصافية المدفوعة لكل مستفيد.</li>
<li><strong>الدخول إلى المنصة:</strong> ادخل إلى بوابة الإدارة العامة للأداءات وقم بالمصادقة باستخدام بياناتك (المعرف الجبائي، كلمة المرور، وعند الاقتضاء الشهادة الإلكترونية).</li>
<li><strong>إدخال أو استيراد البيانات:</strong> أدخل المعلومات المتعلقة بكل مستفيد: المعرف الجبائي، الاسم أو العنوان التجاري، طبيعة الدفع، المبلغ الإجمالي، نسبة الخصم والمبلغ المخصوم. تتيح المنصة أيضًا استيراد ملفات بصيغة منظمة (XML أو CSV).</li>
<li><strong>التحقق والمصادقة:</strong> راجع تناسق البيانات المُدخلة. تقوم المنصة بعمليات تحقق آلية وتُشير إلى أي حالات شاذة (معرفات جبائية غير صالحة، مبالغ غير متسقة، إلخ).</li>
<li><strong>تقديم التصريح:</strong> بمجرد المصادقة على البيانات، قدّم التصريح. يتم إنشاء إشعار استلام إلكتروني يثبت الإيداع في الآجال المحددة.</li>
<li><strong>دفع الأداء:</strong> قم بدفع المبالغ المخصومة عبر وسائل الدفع المقبولة (تحويل بنكي، دفع إلكتروني).</li>
</ol>
<h2>المنصة وطريقة الدخول</h2>
<p>يمكن الدخول إلى منصة TEJ عبر <strong>البوابة الرسمية للإدارة العامة للأداءات</strong> على العنوان <strong>www.impots.finances.gov.tn</strong>. للدخول، يجب عليك مسبقًا:</p>
<ul>
<li>التوفر على <strong>معرف جبائي</strong> صالح ومحدّث.</li>
<li>إنشاء <strong>حساب مستخدم</strong> على بوابة الإدارة العامة للأداءات إن لم يكن موجودًا.</li>
<li>الحصول عند الحاجة على <strong>شهادة إلكترونية</strong> صادرة عن الوكالة الوطنية للمصادقة الإلكترونية (ANCE) لتأمين التبادلات.</li>
</ul>
<p>يُنصح باستخدام متصفح حديث والتأكد من أن إعدادات الأمان تسمح بالدخول إلى البوابة. في حالة وجود صعوبات تقنية، توفر الإدارة العامة للأداءات خدمة مساعدة يمكن الوصول إليها عبر الهاتف والبريد الإلكتروني.</p>
<h2>شهادات الخصم من المورد</h2>
<p>عند كل عملية خصم، تلتزم المؤسسة بتسليم المستفيد <strong>شهادة خصم من المورد</strong>. هذه الوثيقة ضرورية لأنها تمكّن المستفيد من إثبات الخصومات التي تحملها وطرحها من الأداء المستوجب عليه.</p>
<p>يجب أن تتضمن شهادة الخصم بالضرورة:</p>
<ul>
<li>هوية والمعرف الجبائي للمخصوم منه والمدين.</li>
<li>طبيعة ومبلغ الدفع الإجمالي.</li>
<li>نسبة الخصم المطبقة والمبلغ المخصوم.</li>
<li>تاريخ الدفع والفترة المعنية.</li>
</ul>
<p>تسهّل منصة TEJ إنشاء هذه الشهادات من خلال إمكانية تحريرها مباشرة من النظام بعد تقديم التصريح. من الضروري الاحتفاظ بهذه الشهادات لمدة لا تقل عن <strong>10 سنوات</strong> وفقًا للالتزامات القانونية.</p>
<h2>الأخطاء الشائعة التي يجب تجنبها</h2>
<p>ترتكب العديد من المؤسسات أخطاء عند إيداع تصريح TEJ. إليكم الأخطاء الأكثر شيوعًا:</p>
<ul>
<li><strong>التأخر في الإيداع:</strong> يجب إيداع التصريح خلال <strong>الـ 28 يومًا الأولى</strong> من الشهر الذي يلي الشهر الذي تمت فيه الخصومات. كل تأخير يعرّض لغرامات تأخير تُحتسب بنسبة 0.75% شهريًا.</li>
<li><strong>أخطاء في المعرفات الجبائية:</strong> إدخال معرف جبائي خاطئ أو ناقص يؤدي إلى رفض السطر المعني. تحققوا بشكل منهجي من معرفات مورديكم.</li>
<li><strong>تطبيق نسبة خاطئة:</strong> تختلف نسبة الخصم حسب طبيعة الخدمة أو الدفع. الخلط بين النسب (مثلًا تطبيق 3% بدلًا من 1.5%) قد يؤدي إلى تعديلات جبائية.</li>
<li><strong>إغفال مستفيدين:</strong> يجب أن تظهر جميع المدفوعات الخاضعة للخصم في التصريح، بما في ذلك المدفوعات ذات المبالغ الصغيرة.</li>
<li><strong>عدم تسليم الشهادات:</strong> يُعد عدم تسليم شهادات الخصم للمستفيدين مخالفة يعاقب عليها القانون.</li>
</ul>
<h2>كيف يُبسّط SoftyFact العملية</h2>
<p>قد تكون إدارة الخصم من المورد وتصريحات TEJ يدويًا أمرًا مستهلكًا للوقت ومصدرًا للأخطاء. وهنا يأتي دور <a href="/product/offline">SoftyFact Bureau</a>، برنامج الفوترة المصمم خصيصًا للمؤسسات التونسية.</p>
<p>مع <a href="/product/offline">SoftyFact Bureau</a>، تستفيدون من:</p>
<ul>
<li><strong>الحساب التلقائي للخصومات:</strong> يُطبّق البرنامج تلقائيًا النسبة الصحيحة لـ<a href="/blog/retenue-source-tunisie-guide">الخصم من المورد</a> حسب طبيعة كل معاملة.</li>
<li><strong>إنشاء الشهادات:</strong> حرّروا شهادات الخصم بنقرة واحدة، مطابقة للمتطلبات القانونية.</li>
<li><strong>تصدير متوافق مع TEJ:</strong> صدّروا بيانات الخصم بصيغة قابلة للاستيراد مباشرة على منصة TEJ، مما يُلغي إعادة الإدخال اليدوي.</li>
<li><strong>لوحة متابعة جبائية:</strong> تابعوا في الوقت الفعلي حالة خصوماتكم والمبالغ الواجب التصريح بها والآجال الواجب احترامها.</li>
</ul>
<p>من خلال أتمتة هذه المهام، يُمكّنكم <a href="/product/offline">SoftyFact Bureau</a> من توفير وقت ثمين وتقليل مخاطر الأخطاء والبقاء في امتثال تام مع التشريعات الجبائية التونسية. ركّزوا على نشاطكم الأساسي ودعوا SoftyFact يتولى التزاماتكم التصريحية.</p>',
                'meta_description_fr' => 'Déclaration TEJ en Tunisie : guide étape par étape pour générer vos certificats de retenue à la source.',
                'meta_description_ar' => 'تصريح TEJ في تونس: دليل خطوة بخطوة لإنشاء شهادات الخصم من المورد.',
                'meta_keywords' => 'TEJ tunisie, déclaration TEJ, certificat retenue source',
                'cover_image' => '/screen/Certificats TEJ.png',
                'reading_time' => 7,
                'published_at' => '2026-02-15 10:00:00',
            ],

            // ============================================================
            // POST 5 — Facturation électronique El-Fatoora
            // ============================================================
            [
                'slug' => 'facturation-electronique-tunisie-elfatoora',
                'title_fr' => 'Facturation électronique en Tunisie (El-Fatoora) : ce qu\'il faut savoir',
                'title_ar' => 'الفوترة الإلكترونية في تونس (الفاتورة): ما يجب معرفته',
                'excerpt_fr' => 'Tout savoir sur la facturation électronique en Tunisie : cadre légal, calendrier El-Fatoora et comment s\'y préparer.',
                'excerpt_ar' => 'كل ما يجب معرفته عن الفوترة الإلكترونية في تونس: الإطار القانوني وجدول الفاتورة وكيفية الاستعداد.',
                'body_fr' => '<h2>Facturation électronique en Tunisie : tout savoir sur El-Fatoora</h2>
<p>La Tunisie s\'apprête à franchir un cap décisif dans la modernisation de son système fiscal. Avec le projet <strong>El-Fatoora</strong>, le pays rejoint le mouvement mondial vers la facturation électronique obligatoire. Dans cet article, nous vous expliquons tout ce que vous devez savoir pour anticiper cette transformation et préparer votre entreprise.</p>
<h3>1. Qu\'est-ce que la facturation électronique ?</h3>
<p>La facturation électronique, ou <strong>e-facturation</strong>, désigne l\'émission, la transmission et la réception de factures dans un format numérique structuré. Contrairement à une simple facture PDF envoyée par e-mail, une e-facture est un document dont les données sont lisibles par machine, validées automatiquement et transmises via une plateforme centralisée.</p>
<p>Ce système permet à l\'administration fiscale de vérifier en temps réel la conformité des transactions commerciales, réduisant ainsi la fraude fiscale et les erreurs de saisie. De nombreux pays — comme la France, l\'Arabie Saoudite et le Mexique — ont déjà adopté des systèmes similaires avec des résultats significatifs.</p>
<h3>2. El-Fatoora : le projet tunisien</h3>
<p>El-Fatoora est l\'initiative du <strong>Ministère des Finances tunisien</strong> visant à instaurer un système national de facturation électronique. Ce projet s\'inscrit dans une stratégie plus large de digitalisation de l\'économie et de lutte contre l\'évasion fiscale.</p>
<p>Le système reposera sur une <strong>plateforme centrale</strong> gérée par l\'État, à travers laquelle toutes les factures devront transiter. Chaque facture sera validée, horodatée et archivée de manière sécurisée. El-Fatoora s\'appuie sur des standards internationaux, notamment le format XML structuré et la signature numérique, garantissant l\'authenticité et l\'intégrité de chaque document.</p>
<p>Le projet est développé en collaboration avec des partenaires technologiques et s\'inspire des meilleures pratiques internationales, notamment le système saoudien ZATCA (FATOORAH) et les directives européennes en matière de facturation électronique.</p>
<h3>3. Calendrier de déploiement</h3>
<p>Le déploiement d\'El-Fatoora est prévu en plusieurs phases progressives :</p>
<ol>
<li><strong>Phase 1 — Grandes entreprises :</strong> Les sociétés dont le chiffre d\'affaires dépasse un certain seuil seront les premières à devoir émettre leurs factures via la plateforme. Cette phase permettra de tester le système à grande échelle.</li>
<li><strong>Phase 2 — Entreprises de taille intermédiaire :</strong> Les PME structurées seront intégrées progressivement, avec un accompagnement technique et des délais d\'adaptation.</li>
<li><strong>Phase 3 — Généralisation aux TPE et indépendants :</strong> À terme, toutes les entreprises assujetties à la TVA devront utiliser la facturation électronique pour l\'ensemble de leurs transactions B2B et B2G.</li>
</ol>
<p>Les dates précises seront communiquées par décret ministériel. Il est toutefois fortement recommandé de ne pas attendre la dernière minute pour se préparer.</p>
<h3>4. Les avantages pour les entreprises</h3>
<p>L\'adoption de la facturation électronique offre de nombreux bénéfices concrets :</p>
<ul>
<li><strong>Conformité fiscale automatisée :</strong> Chaque facture est validée en temps réel, éliminant le risque de non-conformité lors des contrôles fiscaux.</li>
<li><strong>Réduction des erreurs :</strong> La saisie manuelle est remplacée par des flux de données structurés, réduisant considérablement les erreurs de facturation.</li>
<li><strong>Traitement plus rapide :</strong> Les factures sont transmises et reçues instantanément, accélérant les cycles de paiement et améliorant la trésorerie.</li>
<li><strong>Économies de coûts :</strong> Moins de papier, moins d\'envois postaux, moins de temps consacré au traitement administratif.</li>
<li><strong>Traçabilité complète :</strong> Chaque facture dispose d\'un historique complet, facilitant les audits et le suivi comptable.</li>
<li><strong>Impact environnemental positif :</strong> La dématérialisation contribue à réduire l\'empreinte carbone de l\'entreprise.</li>
</ul>
<h3>5. Ce que doit contenir une e-facture</h3>
<p>Pour être conforme au système El-Fatoora, une <a href="/blog/creer-facture-conforme-tunisie">facture conforme</a> devra obligatoirement inclure les éléments suivants :</p>
<ul>
<li><strong>Identifiants de l\'émetteur et du destinataire :</strong> matricule fiscal, raison sociale, adresse complète.</li>
<li><strong>Numéro unique de facture :</strong> généré selon un format séquentiel défini par la réglementation.</li>
<li><strong>Date et heure d\'émission :</strong> horodatage précis de la création du document.</li>
<li><strong>Détail des lignes :</strong> désignation des produits ou services, quantités, prix unitaires, taux de TVA et montants.</li>
<li><strong>Totaux et taxes :</strong> montant HT, montant de la TVA, timbre fiscal le cas échéant, et montant TTC.</li>
<li><strong>Signature numérique :</strong> certificat électronique garantissant l\'authenticité et l\'intégrité de la facture.</li>
<li><strong>Code QR :</strong> permettant la vérification rapide de la facture via une application mobile ou un scanner.</li>
</ul>
<p>Le format technique retenu sera vraisemblablement basé sur le standard XML, avec une validation par schéma XSD avant transmission à la plateforme centrale.</p>
<h3>6. Comment se préparer dès maintenant</h3>
<p>Même si le calendrier exact n\'est pas encore finalisé, les entreprises tunisiennes peuvent d\'ores et déjà prendre des mesures concrètes :</p>
<ol>
<li><strong>Auditer votre processus de facturation actuel :</strong> identifiez les écarts entre vos pratiques et les exigences de la facturation électronique.</li>
<li><strong>Choisir un logiciel de facturation compatible :</strong> optez pour une solution qui intègre déjà les standards de la e-facturation et qui sera mise à jour pour El-Fatoora.</li>
<li><strong>Former vos équipes :</strong> sensibilisez vos collaborateurs comptables et administratifs aux nouvelles procédures.</li>
<li><strong>Vérifier vos données fiscales :</strong> assurez-vous que vos matricules fiscaux, adresses et informations légales sont à jour.</li>
<li><strong>Tester en environnement pilote :</strong> si votre logiciel le permet, effectuez des tests d\'émission de factures électroniques avant l\'entrée en vigueur.</li>
</ol>
<h3>7. SoftyFact sera prêt pour El-Fatoora</h3>
<p>Chez SoftyFact, nous suivons de près l\'évolution du projet El-Fatoora et travaillons activement à l\'intégration complète de la facturation électronique dans nos solutions. Que vous utilisiez <a href="/product/online">SoftyFact Cloud</a> ou <a href="/product/offline">SoftyFact Bureau</a>, vous bénéficierez d\'une mise à jour transparente le moment venu.</p>
<p>Notre engagement : vous offrir une transition fluide vers la facturation électronique, sans complexité technique, avec un accompagnement personnalisé à chaque étape. Vos factures seront conformes, signées numériquement et transmises automatiquement à la plateforme El-Fatoora.</p>
<p><strong>N\'attendez pas la dernière minute.</strong> Commencez dès aujourd\'hui à structurer votre facturation avec SoftyFact et soyez parmi les premiers à être conformes lorsque El-Fatoora entrera en vigueur.</p>',
                'body_ar' => '<h2>الفوترة الإلكترونية في تونس: كل ما تحتاج معرفته عن الفاتورة</h2>
<p>تستعد تونس لخطوة حاسمة في تحديث منظومتها الجبائية. من خلال مشروع <strong>الفاتورة (El-Fatoora)</strong>، تنضم البلاد إلى الحركة العالمية نحو الفوترة الإلكترونية الإلزامية. في هذا المقال، نشرح لكم كل ما يجب معرفته للاستعداد لهذا التحول وتهيئة مؤسستكم.</p>
<h3>1. ما هي الفوترة الإلكترونية؟</h3>
<p>الفوترة الإلكترونية تعني إصدار الفواتير وإرسالها واستلامها في شكل رقمي منظم. على عكس فاتورة PDF بسيطة تُرسل عبر البريد الإلكتروني، فإن الفاتورة الإلكترونية هي وثيقة بيانات قابلة للقراءة آليًا، يتم التحقق منها تلقائيًا وإرسالها عبر منصة مركزية.</p>
<p>يتيح هذا النظام للإدارة الجبائية التحقق الفوري من مطابقة المعاملات التجارية، مما يقلل من التهرب الضريبي وأخطاء الإدخال. وقد اعتمدت دول عديدة — مثل فرنسا والمملكة العربية السعودية والمكسيك — أنظمة مماثلة بنتائج ملموسة.</p>
<h3>2. الفاتورة: المشروع التونسي</h3>
<p>الفاتورة هي مبادرة <strong>وزارة المالية التونسية</strong> لإرساء نظام وطني للفوترة الإلكترونية. يندرج هذا المشروع ضمن استراتيجية أوسع لرقمنة الاقتصاد ومكافحة التهرب الجبائي.</p>
<p>سيرتكز النظام على <strong>منصة مركزية</strong> تديرها الدولة، تمر عبرها جميع الفواتير. سيتم التحقق من كل فاتورة وختمها زمنيًا وأرشفتها بشكل آمن. يعتمد مشروع الفاتورة على معايير دولية، لا سيما صيغة XML المنظمة والتوقيع الرقمي، مما يضمن أصالة كل وثيقة وسلامتها.</p>
<p>يتم تطوير المشروع بالتعاون مع شركاء تقنيين، مستلهمًا من أفضل الممارسات الدولية، خاصة نظام زاتكا السعودي (فاتورة) والتوجيهات الأوروبية في مجال الفوترة الإلكترونية.</p>
<h3>3. الجدول الزمني للتطبيق</h3>
<p>من المقرر نشر نظام الفاتورة على عدة مراحل تدريجية:</p>
<ol>
<li><strong>المرحلة الأولى — المؤسسات الكبرى:</strong> ستكون الشركات التي يتجاوز رقم معاملاتها حدًا معينًا أول من يُلزم بإصدار فواتيره عبر المنصة. تتيح هذه المرحلة اختبار النظام على نطاق واسع.</li>
<li><strong>المرحلة الثانية — المؤسسات المتوسطة:</strong> سيتم إدماج المؤسسات الصغرى والمتوسطة تدريجيًا، مع مرافقة تقنية وآجال للتكيف.</li>
<li><strong>المرحلة الثالثة — التعميم على المؤسسات الصغيرة والمستقلين:</strong> في نهاية المطاف، ستُلزم جميع المؤسسات الخاضعة للأداء على القيمة المضافة باستخدام الفوترة الإلكترونية في كافة معاملاتها بين المؤسسات (B2B) ومع الدولة (B2G).</li>
</ol>
<p>سيتم الإعلان عن التواريخ الدقيقة بموجب أمر وزاري. غير أنه يُنصح بشدة بعدم الانتظار حتى اللحظة الأخيرة للاستعداد.</p>
<h3>4. المزايا للمؤسسات</h3>
<p>يوفر اعتماد الفوترة الإلكترونية فوائد عملية عديدة:</p>
<ul>
<li><strong>الامتثال الجبائي التلقائي:</strong> يتم التحقق من كل فاتورة فوريًا، مما يزيل خطر عدم المطابقة أثناء المراجعات الجبائية.</li>
<li><strong>تقليل الأخطاء:</strong> يحل تدفق البيانات المنظم محل الإدخال اليدوي، مما يخفض أخطاء الفوترة بشكل كبير.</li>
<li><strong>معالجة أسرع:</strong> تُرسل الفواتير وتُستلم فوريًا، مما يسرّع دورات الدفع ويحسّن السيولة المالية.</li>
<li><strong>توفير التكاليف:</strong> ورق أقل، إرسال بريدي أقل، ووقت أقل مخصص للمعالجة الإدارية.</li>
<li><strong>تتبع كامل:</strong> لكل فاتورة سجل تاريخي كامل، مما يسهل عمليات التدقيق والمتابعة المحاسبية.</li>
<li><strong>أثر بيئي إيجابي:</strong> تساهم الرقمنة في تقليل البصمة الكربونية للمؤسسة.</li>
</ul>
<h3>5. ما يجب أن تتضمنه الفاتورة الإلكترونية</h3>
<p>لتكون متوافقة مع نظام الفاتورة، يجب أن تتضمن <a href="/blog/creer-facture-conforme-tunisie">الفاتورة المطابقة</a> العناصر التالية إلزاميًا:</p>
<ul>
<li><strong>معرّفات المُصدر والمستلم:</strong> المعرّف الجبائي، الاسم التجاري، العنوان الكامل.</li>
<li><strong>رقم فاتورة فريد:</strong> يُنشأ وفق صيغة تسلسلية محددة من طرف التنظيم.</li>
<li><strong>تاريخ ووقت الإصدار:</strong> ختم زمني دقيق لإنشاء الوثيقة.</li>
<li><strong>تفاصيل البنود:</strong> وصف المنتجات أو الخدمات، الكميات، الأسعار الوحدوية، نسب الأداء على القيمة المضافة والمبالغ.</li>
<li><strong>المجاميع والضرائب:</strong> المبلغ دون احتساب الأداء، مبلغ الأداء على القيمة المضافة، الطابع الجبائي عند الاقتضاء، والمبلغ الإجمالي.</li>
<li><strong>التوقيع الرقمي:</strong> شهادة إلكترونية تضمن أصالة الفاتورة وسلامتها.</li>
<li><strong>رمز QR:</strong> يتيح التحقق السريع من الفاتورة عبر تطبيق هاتف محمول أو ماسح ضوئي.</li>
</ul>
<p>من المرجح أن يكون الشكل التقني المعتمد مبنيًا على معيار XML، مع التحقق بمخطط XSD قبل الإرسال إلى المنصة المركزية.</p>
<h3>6. كيف تستعد من الآن</h3>
<p>حتى وإن لم يُحدد الجدول الزمني النهائي بعد، يمكن للمؤسسات التونسية اتخاذ خطوات عملية من الآن:</p>
<ol>
<li><strong>تدقيق عملية الفوترة الحالية:</strong> حددوا الفجوات بين ممارساتكم الحالية ومتطلبات الفوترة الإلكترونية.</li>
<li><strong>اختيار برنامج فوترة متوافق:</strong> اختاروا حلًا يدمج معايير الفوترة الإلكترونية ويُحدّث تلقائيًا لنظام الفاتورة.</li>
<li><strong>تدريب فرقكم:</strong> وعّوا الموظفين المحاسبيين والإداريين بالإجراءات الجديدة.</li>
<li><strong>التحقق من بياناتكم الجبائية:</strong> تأكدوا من تحديث المعرّفات الجبائية والعناوين والمعلومات القانونية.</li>
<li><strong>الاختبار في بيئة تجريبية:</strong> إذا سمح برنامجكم بذلك، أجروا اختبارات لإصدار فواتير إلكترونية قبل دخول النظام حيز التنفيذ.</li>
</ol>
<h3>7. سوفتي فاكت جاهز للفاتورة</h3>
<p>في سوفتي فاكت، نتابع عن كثب تطور مشروع الفاتورة ونعمل بنشاط على دمج الفوترة الإلكترونية بالكامل في حلولنا. سواء كنتم تستخدمون <a href="/product/online">SoftyFact Cloud</a> أو <a href="/product/offline">SoftyFact Bureau</a>، ستستفيدون من تحديث سلس في الوقت المناسب.</p>
<p>التزامنا: توفير انتقال سهل إلى الفوترة الإلكترونية، دون تعقيد تقني، مع مرافقة شخصية في كل مرحلة. ستكون فواتيركم مطابقة، موقعة رقميًا ومرسلة تلقائيًا إلى منصة الفاتورة.</p>
<p><strong>لا تنتظروا اللحظة الأخيرة.</strong> ابدأوا اليوم في هيكلة فوترتكم مع سوفتي فاكت وكونوا من أوائل المؤسسات المطابقة عند دخول نظام الفاتورة حيز التنفيذ.</p>',
                'meta_description_fr' => 'Facturation électronique El-Fatoora en Tunisie : cadre légal, calendrier et préparation pour les entreprises.',
                'meta_description_ar' => 'الفوترة الإلكترونية في تونس: الإطار القانوني والتحضير للمؤسسات.',
                'meta_keywords' => 'facturation électronique tunisie, el fatoora, e-facture tunisie',
                'cover_image' => '/screen/gestion-des-documents(exemple Devis).png',
                'reading_time' => 6,
                'published_at' => '2026-02-25 10:00:00',
            ],

            // ============================================================
            // POST 6 — Retenue à la source
            // ============================================================
            [
                'slug' => 'retenue-source-tunisie-guide',
                'title_fr' => 'Retenue à la source en Tunisie : guide complet 2026',
                'title_ar' => 'الخصم من المورد في تونس: الدليل الشامل 2026',
                'excerpt_fr' => 'Comprendre la retenue à la source en Tunisie : taux, obligations et gestion des certificats RS pour votre entreprise.',
                'excerpt_ar' => 'فهم الخصم من المورد في تونس: النسب والالتزامات وإدارة شهادات RS لمؤسستك.',
                'body_fr' => '<h2>Qu\'est-ce que la retenue à la source ?</h2>
<p>La <strong>retenue à la source</strong> est un mécanisme fiscal par lequel le payeur (client ou entreprise) prélève un pourcentage sur les montants dus à un prestataire ou fournisseur, avant de le reverser directement à l\'État tunisien. Ce système, régi par le <strong>Code de l\'Impôt sur le Revenu des Personnes Physiques et de l\'Impôt sur les Sociétés (IRPP/IS)</strong>, permet à l\'administration fiscale de collecter l\'impôt de manière anticipée et régulière.</p>
<p>En pratique, lorsque vous payez une facture, vous ne versez pas la totalité du montant au fournisseur : une fraction est retenue et déclarée au fisc via la <a href="/blog/declaration-tej-guide-pratique">déclaration TEJ</a>. Le fournisseur reçoit un <strong>certificat de retenue</strong> qu\'il pourra imputer sur son propre impôt annuel.</p>
<h2>Les principaux taux de retenue à la source en 2026</h2>
<p>La législation tunisienne prévoit plusieurs taux de retenue selon la nature de l\'opération et le statut du bénéficiaire. Voici les taux les plus courants :</p>
<h3>Taux de 1 %</h3>
<ul>
<li>Achats de marchandises auprès de fabricants ou grossistes non soumis au régime forfaitaire</li>
<li>Montants payés dans le cadre de marchés publics (travaux, fournitures)</li>
</ul>
<h3>Taux de 1,5 %</h3>
<ul>
<li>Honoraires, commissions et courtages versés à des personnes morales résidentes</li>
<li>Rémunérations versées aux entreprises de travaux et services non soumises à un taux spécifique</li>
</ul>
<h3>Taux de 3 %</h3>
<ul>
<li>Honoraires versés aux personnes physiques soumises au régime réel (consultants, experts)</li>
<li>Rémunérations occasionnelles versées à des personnes non établies en Tunisie</li>
</ul>
<h3>Taux de 5 %</h3>
<ul>
<li>Honoraires versés aux bureaux d\'études et cabinets de conseil</li>
<li>Rémunérations des artistes et sportifs</li>
</ul>
<h3>Taux de 10 %</h3>
<ul>
<li>Honoraires versés aux avocats, notaires, huissiers, architectes et experts judiciaires</li>
<li>Loyers d\'immeubles et équipements versés à des personnes physiques</li>
</ul>
<h3>Taux de 15 %</h3>
<ul>
<li>Revenus de capitaux mobiliers (dividendes, intérêts) versés à des résidents</li>
<li>Plus-values de cession de titres dans certains cas</li>
</ul>
<h3>Taux de 20 %</h3>
<ul>
<li>Rémunérations versées à des non-résidents pour des prestations de services utilisées en Tunisie</li>
<li>Redevances et droits de licence versés à l\'étranger</li>
</ul>
<h3>Taux de 25 %</h3>
<ul>
<li>Rémunérations versées à des bénéficiaires résidant dans des paradis fiscaux</li>
<li>Commissions versées à des intermédiaires non-résidents sans convention fiscale</li>
</ul>
<h2>Qui est soumis à la retenue à la source ?</h2>
<p>Deux parties sont impliquées dans chaque opération de retenue :</p>
<ol>
<li><strong>Le débiteur (payeur) :</strong> toute personne morale ou physique soumise au régime réel qui effectue un paiement est tenue d\'opérer la retenue. Cela inclut les sociétés, les établissements publics, les associations et les professions libérales.</li>
<li><strong>Le bénéficiaire (fournisseur) :</strong> la personne qui subit la retenue sur les montants qu\'elle perçoit. Elle récupère cette retenue sous forme de crédit d\'impôt lors de sa déclaration annuelle.</li>
</ol>
<p>Sont <strong>dispensés</strong> de retenue : les paiements inférieurs à 1 000 DT TTC par opération pour les achats de marchandises, et les transactions entre entreprises totalement exportatrices dans certaines conditions.</p>
<h2>Comment calculer la retenue à la source</h2>
<p>La retenue se calcule sur le <strong>montant hors <a href="/blog/guide-tva-tunisie">TVA</a></strong>. Voici un exemple concret :</p>
<p><strong>Exemple :</strong> Vous recevez une facture d\'un consultant (personne physique, régime réel) pour 2 000 DT HT + 380 DT de TVA (19 %) = 2 380 DT TTC.</p>
<ol>
<li>Base de retenue = 2 000 DT (montant HT)</li>
<li>Taux applicable = 3 % (honoraires personne physique)</li>
<li>Montant de la retenue = 2 000 × 3 % = <strong>60 DT</strong></li>
<li>Net à payer au fournisseur = 2 380 − 60 = <strong>2 320 DT</strong></li>
</ol>
<p><strong>Autre exemple :</strong> Achat de marchandises auprès d\'un grossiste pour 10 000 DT HT + 1 900 DT TVA = 11 900 DT TTC.</p>
<ol>
<li>Retenue = 10 000 × 1 % = <strong>100 DT</strong></li>
<li>Net à payer = 11 900 − 100 = <strong>11 800 DT</strong></li>
</ol>
<h2>Obligations déclaratives et certificats</h2>
<p>Chaque entreprise qui pratique la retenue à la source doit respecter des obligations strictes :</p>
<ul>
<li><strong>Déclaration mensuelle :</strong> les retenues opérées durant un mois doivent être déclarées et payées avant le 28 du mois suivant via la <a href="/blog/declaration-tej-guide-pratique">déclaration TEJ</a> (Télé-déclaration et Télé-paiement).</li>
<li><strong>Certificat de retenue :</strong> un certificat doit être délivré au fournisseur dans un délai de 30 jours suivant la retenue. Ce document mentionne le montant brut, le taux appliqué et le montant retenu.</li>
<li><strong>Déclaration annuelle récapitulative :</strong> un état récapitulatif de toutes les retenues de l\'année doit être déposé avant le 28 février de l\'année suivante.</li>
</ul>
<h2>Erreurs courantes et pénalités</h2>
<p>Les erreurs de retenue à la source sont fréquentes et peuvent coûter cher :</p>
<ul>
<li><strong>Oubli de retenue :</strong> l\'entreprise reste redevable du montant non retenu, majoré de pénalités de retard de <strong>0,75 % par mois</strong> de retard.</li>
<li><strong>Application du mauvais taux :</strong> une retenue insuffisante entraîne un redressement fiscal. Un excédent de retenue crée un litige avec le fournisseur.</li>
<li><strong>Retard de déclaration :</strong> en cas de dépôt tardif, une pénalité fixe s\'ajoute aux intérêts de retard.</li>
<li><strong>Non-délivrance du certificat :</strong> le fournisseur ne pourra pas imputer la retenue sur son impôt, ce qui peut entraîner un recours contre le payeur.</li>
<li><strong>Calcul sur le TTC au lieu du HT :</strong> une des erreurs les plus courantes qui fausse le montant retenu et les déclarations.</li>
</ul>
<h2>Automatiser la retenue à la source avec SoftyFact</h2>
<p>La gestion manuelle de la retenue à la source est source d\'erreurs et de perte de temps. <a href="/product/offline">SoftyFact Bureau</a> automatise l\'ensemble du processus :</p>
<ul>
<li><strong>Calcul automatique :</strong> le taux de retenue est appliqué automatiquement selon le type de fournisseur et la nature de la prestation.</li>
<li><strong>Génération des certificats :</strong> les certificats de retenue sont générés en un clic, conformes aux exigences légales.</li>
<li><strong>Préparation de la déclaration TEJ :</strong> toutes les retenues du mois sont récapitulées et prêtes à être déclarées.</li>
<li><strong>Conformité fiscale :</strong> les taux sont mis à jour selon la législation en vigueur, éliminant tout risque d\'erreur.</li>
</ul>
<p>Ne laissez plus la complexité fiscale freiner votre activité. Avec SoftyFact, chaque facture est traitée dans le respect total de la réglementation tunisienne.</p>',
                'body_ar' => '<h2>ما هي الخصم من المورد؟</h2>
<p><strong>الخصم من المورد</strong> (Retenue à la source) هو آلية جبائية يقوم بموجبها الحريف أو المؤسسة الدافعة باقتطاع نسبة مئوية من المبالغ المستحقة للمزوّد أو مسدي الخدمات، قبل تحويلها مباشرة إلى خزينة الدولة التونسية. ينظّم هذا النظام <strong>مجلة الضريبة على دخل الأشخاص الطبيعيين والضريبة على الشركات</strong>، ويُمكّن الإدارة الجبائية من تحصيل الضريبة بشكل مسبق ومنتظم.</p>
<p>عمليًا، عند دفع فاتورة، لا يتم تحويل كامل المبلغ إلى المزوّد: يتم اقتطاع جزء والتصريح به لدى مصالح الجباية عبر <a href="/blog/declaration-tej-guide-pratique">التصريح عن بعد TEJ</a>. يحصل المزوّد على <strong>شهادة خصم</strong> يمكنه احتسابها ضمن ضريبته السنوية.</p>
<h2>أهم نسب الخصم من المورد في 2026</h2>
<p>يحدد التشريع التونسي عدة نسب خصم حسب طبيعة العملية وصفة المستفيد. فيما يلي أبرز النسب المعتمدة:</p>
<h3>نسبة 1%</h3>
<ul>
<li>شراء بضائع من مصنّعين أو تجار جملة غير خاضعين للنظام التقديري</li>
<li>المبالغ المدفوعة في إطار الصفقات العمومية (أشغال، توريدات)</li>
</ul>
<h3>نسبة 1,5%</h3>
<ul>
<li>أتعاب وعمولات وسمسرة مدفوعة للذوات المعنوية المقيمة</li>
<li>مكافآت مسداة لمؤسسات الأشغال والخدمات غير الخاضعة لنسبة محددة</li>
</ul>
<h3>نسبة 3%</h3>
<ul>
<li>أتعاب مدفوعة للأشخاص الطبيعيين الخاضعين للنظام الحقيقي (مستشارون، خبراء)</li>
<li>مكافآت عرضية مدفوعة لأشخاص غير مقيمين في تونس</li>
</ul>
<h3>نسبة 5%</h3>
<ul>
<li>أتعاب مكاتب الدراسات والاستشارات</li>
<li>مكافآت الفنانين والرياضيين</li>
</ul>
<h3>نسبة 10%</h3>
<ul>
<li>أتعاب المحامين وعدول الإشهاد والعدول المنفذين والمهندسين المعماريين والخبراء العدليين</li>
<li>إيجارات العقارات والتجهيزات المدفوعة لأشخاص طبيعيين</li>
</ul>
<h3>نسبة 15%</h3>
<ul>
<li>مداخيل رؤوس الأموال المنقولة (أرباح أسهم، فوائض) المدفوعة للمقيمين</li>
<li>فوائض التفويت في السندات في بعض الحالات</li>
</ul>
<h3>نسبة 20%</h3>
<ul>
<li>مكافآت مدفوعة لغير المقيمين مقابل خدمات مستعملة في تونس</li>
<li>إتاوات وحقوق ترخيص مدفوعة للخارج</li>
</ul>
<h3>نسبة 25%</h3>
<ul>
<li>مكافآت مدفوعة لمستفيدين مقيمين في ملاذات ضريبية</li>
<li>عمولات مدفوعة لوسطاء غير مقيمين بدون اتفاقية جبائية</li>
</ul>
<h2>من يخضع للخصم من المورد؟</h2>
<p>يتدخل طرفان في كل عملية خصم:</p>
<ol>
<li><strong>المدين (الدافع):</strong> كل ذات معنوية أو طبيعية خاضعة للنظام الحقيقي تقوم بدفع مبلغ ما، ملزمة بإجراء الخصم. يشمل ذلك الشركات والمؤسسات العمومية والجمعيات وأصحاب المهن الحرة.</li>
<li><strong>المستفيد (المزوّد):</strong> الشخص الذي يُطبّق عليه الخصم على المبالغ التي يتقاضاها. يسترجع هذا الخصم كقرض ضريبي عند تقديم تصريحه السنوي.</li>
</ol>
<p>تُعفى من الخصم: المدفوعات التي تقل عن 1000 دينار شاملة الأداء لكل عملية شراء بضائع، والمعاملات بين المؤسسات المصدّرة كليًا في ظروف معينة.</p>
<h2>كيفية حساب الخصم من المورد</h2>
<p>يُحسب الخصم على <strong>المبلغ دون احتساب <a href="/blog/guide-tva-tunisie">الأداء على القيمة المضافة</a></strong>. إليكم مثالًا عمليًا:</p>
<p><strong>مثال:</strong> تتلقون فاتورة من مستشار (شخص طبيعي، نظام حقيقي) بمبلغ 2000 دينار خارج الأداء + 380 دينار أداء على القيمة المضافة (19%) = 2380 دينار شاملة الأداء.</p>
<ol>
<li>قاعدة الخصم = 2000 دينار (المبلغ خارج الأداء)</li>
<li>النسبة المطبّقة = 3% (أتعاب شخص طبيعي)</li>
<li>مبلغ الخصم = 2000 × 3% = <strong>60 دينار</strong></li>
<li>الصافي المدفوع للمزوّد = 2380 − 60 = <strong>2320 دينار</strong></li>
</ol>
<p><strong>مثال آخر:</strong> شراء بضائع من تاجر جملة بمبلغ 10000 دينار خارج الأداء + 1900 دينار أداء = 11900 دينار شاملة الأداء.</p>
<ol>
<li>الخصم = 10000 × 1% = <strong>100 دينار</strong></li>
<li>الصافي المدفوع = 11900 − 100 = <strong>11800 دينار</strong></li>
</ol>
<h2>الالتزامات التصريحية والشهادات</h2>
<p>يتعين على كل مؤسسة تمارس الخصم من المورد احترام التزامات صارمة:</p>
<ul>
<li><strong>التصريح الشهري:</strong> يجب التصريح بالمبالغ المقتطعة خلال الشهر ودفعها قبل يوم 28 من الشهر الموالي عبر <a href="/blog/declaration-tej-guide-pratique">منظومة TEJ للتصريح عن بعد</a>.</li>
<li><strong>شهادة الخصم:</strong> يجب تسليم شهادة خصم للمزوّد في أجل 30 يومًا من تاريخ الخصم. تتضمن الوثيقة المبلغ الخام والنسبة المطبّقة والمبلغ المقتطع.</li>
<li><strong>التصريح السنوي التلخيصي:</strong> يجب إيداع جدول تلخيصي لجميع عمليات الخصم للسنة قبل 28 فيفري من السنة الموالية.</li>
</ul>
<h2>الأخطاء الشائعة والعقوبات</h2>
<p>أخطاء الخصم من المورد شائعة وقد تكون مكلفة:</p>
<ul>
<li><strong>نسيان إجراء الخصم:</strong> تبقى المؤسسة مدينة بالمبلغ غير المقتطع، مع خطايا تأخير بنسبة <strong>0,75% شهريًا</strong>.</li>
<li><strong>تطبيق نسبة خاطئة:</strong> الخصم الناقص يؤدي إلى توظيف إضافي. الخصم الزائد يُحدث نزاعًا مع المزوّد.</li>
<li><strong>التأخر في التصريح:</strong> يترتب عن التأخير في الإيداع خطية قارة تُضاف إلى فوائض التأخير.</li>
<li><strong>عدم تسليم شهادة الخصم:</strong> لن يتمكن المزوّد من احتساب الخصم ضمن ضريبته، مما قد يؤدي إلى رفع دعوى ضد الدافع.</li>
<li><strong>الحساب على المبلغ شاملًا الأداء بدل المبلغ خارج الأداء:</strong> من أكثر الأخطاء شيوعًا التي تُخلّ بمبلغ الخصم والتصريحات.</li>
</ul>
<h2>أتمتة الخصم من المورد مع SoftyFact</h2>
<p>التسيير اليدوي للخصم من المورد مصدر للأخطاء وهدر للوقت. <a href="/product/offline">SoftyFact Bureau</a> يؤتمت العملية بالكامل:</p>
<ul>
<li><strong>حساب آلي:</strong> تُطبّق نسبة الخصم تلقائيًا حسب نوع المزوّد وطبيعة الخدمة.</li>
<li><strong>إصدار الشهادات:</strong> تُنشأ شهادات الخصم بنقرة واحدة، مطابقة للمتطلبات القانونية.</li>
<li><strong>إعداد تصريح TEJ:</strong> تُجمّع كل عمليات الخصم الشهرية وتكون جاهزة للتصريح.</li>
<li><strong>الامتثال الجبائي:</strong> تُحدّث النسب وفقًا للتشريع الجاري به العمل، مما يُلغي أي خطر خطأ.</li>
</ul>
<p>لا تدعوا تعقيدات الجباية تُعرقل نشاطكم. مع SoftyFact، كل فاتورة تُعالج في احترام تام للتراتيب التونسية.</p>',
                'meta_description_fr' => 'Retenue à la source en Tunisie 2026 : taux, obligations déclaratives et gestion des certificats.',
                'meta_description_ar' => 'الخصم من المورد في تونس 2026: النسب والتزامات التصريح وإدارة الشهادات.',
                'meta_keywords' => 'retenue source tunisie, retenue à la source, RS tunisie',
                'cover_image' => '/screen/gestion des clients.png',
                'reading_time' => 7,
                'published_at' => '2026-03-01 10:00:00',
            ],

            // ============================================================
            // POST 7 — Gestion de stock PME
            // ============================================================
            [
                'slug' => 'gestion-stock-pme-tunisie',
                'title_fr' => 'Gestion de stock pour PME tunisiennes : bonnes pratiques',
                'title_ar' => 'إدارة المخزون للمؤسسات الصغرى والمتوسطة التونسية: أفضل الممارسات',
                'excerpt_fr' => 'Les meilleures pratiques pour gérer efficacement le stock de votre PME tunisienne : méthodes, outils et erreurs à éviter.',
                'excerpt_ar' => 'أفضل الممارسات لإدارة مخزون مؤسستك الصغيرة أو المتوسطة في تونس: الأساليب والأدوات.',
                'body_fr' => '<h2>Pourquoi la gestion de stock est critique pour les PME tunisiennes</h2>
<p>Pour une PME tunisienne, le stock représente souvent l\'un des postes les plus importants du bilan. Une mauvaise gestion de stock entraîne des ruptures qui font perdre des ventes, ou à l\'inverse, un surstockage qui immobilise la trésorerie et augmente les coûts de stockage. Dans un contexte économique où chaque dinar compte, maîtriser ses flux de marchandises n\'est pas un luxe — c\'est une nécessité.</p>
<p>Selon les études du secteur, les PME qui adoptent un système de gestion de stock informatisé réduisent leurs pertes de 20 à 30 %. Pourtant, de nombreuses entreprises tunisiennes continuent de gérer leur stock sur des cahiers ou des fichiers Excel, avec tous les risques d\'erreur que cela comporte. Si vous cherchez à moderniser votre gestion, le choix d\'un bon outil est essentiel — découvrez comment <a href="/blog/comment-choisir-logiciel-facturation-tunisie">choisir un logiciel de facturation</a> adapté à vos besoins.</p>
<h2>Les méthodes de valorisation du stock</h2>
<p>La valorisation du stock détermine comment vous calculez le coût de vos marchandises vendues et la valeur de votre stock restant. En Tunisie, trois méthodes sont couramment utilisées :</p>
<ul>
<li><strong>FIFO (First In, First Out) :</strong> les premiers articles entrés en stock sont les premiers vendus. Cette méthode reflète bien la réalité pour les produits périssables et est recommandée par les normes comptables tunisiennes.</li>
<li><strong>LIFO (Last In, First Out) :</strong> les derniers articles entrés sont vendus en premier. Moins courante en Tunisie, elle peut être utilisée dans certains secteurs industriels.</li>
<li><strong>Coût Moyen Pondéré (CMP) :</strong> le coût unitaire est recalculé à chaque nouvelle entrée en stock. C\'est la méthode la plus simple à mettre en œuvre et la plus répandue parmi les PME tunisiennes.</li>
</ul>
<p>Le choix de la méthode dépend de votre activité et de votre régime fiscal. Un logiciel de gestion adapté vous permet de configurer la méthode souhaitée et de calculer automatiquement la valeur de votre stock en temps réel.</p>
<h2>Seuils d\'alerte et réapprovisionnement</h2>
<p>Attendre d\'être en rupture de stock pour passer commande est une erreur coûteuse. La mise en place de seuils d\'alerte vous permet d\'anticiper vos besoins :</p>
<ol>
<li><strong>Stock minimum :</strong> le niveau en dessous duquel une alerte de réapprovisionnement est déclenchée. Il doit couvrir le délai de livraison de votre fournisseur.</li>
<li><strong>Stock de sécurité :</strong> une marge supplémentaire pour faire face aux imprévus (retard fournisseur, pic de demande).</li>
<li><strong>Stock maximum :</strong> le plafond à ne pas dépasser pour éviter le surstockage et les coûts d\'entreposage inutiles.</li>
</ol>
<p>En configurant ces seuils dans votre logiciel de gestion, vous recevez des notifications automatiques dès qu\'un article atteint un niveau critique. Cela vous permet de passer vos commandes au bon moment, ni trop tôt, ni trop tard.</p>
<h2>Suivi multi-entrepôts</h2>
<p>De nombreuses PME tunisiennes opèrent depuis plusieurs points de stockage : un entrepôt principal, une boutique, un dépôt régional. Sans un suivi centralisé, il devient impossible de savoir exactement où se trouve chaque article.</p>
<p>Un système multi-entrepôts vous permet de :</p>
<ul>
<li>Visualiser le stock disponible par emplacement en temps réel</li>
<li>Effectuer des transferts inter-entrepôts avec traçabilité complète</li>
<li>Optimiser la répartition des marchandises selon la demande locale</li>
<li>Éviter les doubles commandes lorsqu\'un article est disponible dans un autre dépôt</li>
</ul>
<p>Cette visibilité globale est un avantage concurrentiel majeur, surtout pour les entreprises qui livrent sur tout le territoire tunisien.</p>
<h2>Inventaire physique et gestion des écarts</h2>
<p>L\'inventaire physique est une obligation légale en Tunisie. Il consiste à compter physiquement toutes les marchandises et à comparer les résultats avec le stock théorique enregistré dans votre système. Les écarts peuvent provenir de :</p>
<ul>
<li>Erreurs de saisie lors des entrées ou sorties de stock</li>
<li>Casse ou détérioration non enregistrée</li>
<li>Vol ou perte</li>
<li>Erreurs de livraison fournisseur</li>
</ul>
<p>Un bon logiciel de gestion de stock facilite l\'inventaire en générant des fiches de comptage, en calculant automatiquement les écarts et en permettant les ajustements avec justificatif. Vous gagnez du temps et vous restez en conformité avec la réglementation tunisienne.</p>
<h2>Erreurs courantes dans la gestion de stock</h2>
<p>Voici les erreurs les plus fréquentes que commettent les PME tunisiennes dans la gestion de leur stock :</p>
<ol>
<li><strong>Ne pas mettre à jour le stock en temps réel :</strong> chaque entrée et sortie doit être enregistrée immédiatement pour éviter les décalages.</li>
<li><strong>Ignorer les produits à faible rotation :</strong> ces articles immobilisent du capital et occupent de l\'espace. Identifiez-les et mettez en place des promotions pour les écouler.</li>
<li><strong>Ne pas former le personnel :</strong> un outil performant ne sert à rien si les employés ne savent pas l\'utiliser correctement.</li>
<li><strong>Mélanger stock personnel et professionnel :</strong> une erreur fréquente chez les auto-entrepreneurs tunisiens qui complique la comptabilité.</li>
<li><strong>Négliger l\'inventaire régulier :</strong> un inventaire annuel ne suffit pas. Planifiez des inventaires tournants pour détecter les écarts rapidement.</li>
</ol>
<h2>Conclusion — Automatisez votre gestion de stock avec SoftyFact</h2>
<p>La gestion de stock ne devrait pas être une source de stress pour votre PME. Avec le bon outil, vous transformez cette contrainte en avantage compétitif. <a href="/product/offline">SoftyFact Bureau</a> vous offre une solution complète et adaptée au contexte tunisien :</p>
<ul>
<li>Gestion multi-entrepôts avec transferts et traçabilité</li>
<li>Alertes automatiques sur les seuils de stock (minimum et maximum)</li>
<li>Suivi en temps réel de chaque mouvement de stock</li>
<li>Valorisation automatique selon la méthode de votre choix (FIFO, CMP)</li>
<li>Module d\'inventaire physique avec gestion des écarts</li>
<li>Fonctionne hors ligne — idéal pour les zones à connexion instable</li>
</ul>
<p>Ne laissez plus les approximations coûter de l\'argent à votre entreprise. Passez à une gestion de stock professionnelle dès aujourd\'hui avec <a href="/product/offline">SoftyFact Bureau</a>.</p>',
                'body_ar' => '<h2>لماذا تُعدّ إدارة المخزون أمرًا حاسمًا للمؤسسات الصغرى والمتوسطة التونسية</h2>
<p>بالنسبة للمؤسسات الصغرى والمتوسطة في تونس، يُمثّل المخزون في الغالب أحد أهم البنود في الميزانية العمومية. فسوء إدارة المخزون يؤدي إلى نفاد البضائع وبالتالي خسارة المبيعات، أو على العكس، إلى تكديس مفرط يُجمّد السيولة المالية ويزيد من تكاليف التخزين. في سياق اقتصادي يكون فيه كل دينار مهمًّا، فإنّ التحكّم في تدفّق البضائع ليس ترفًا — بل ضرورة حتمية.</p>
<p>تُشير الدراسات القطاعية إلى أنّ المؤسسات التي تعتمد نظامًا معلوماتيًا لإدارة المخزون تُقلّص خسائرها بنسبة 20 إلى 30%. ومع ذلك، لا تزال العديد من المؤسسات التونسية تُدير مخزونها عبر دفاتر ورقية أو ملفات Excel، مع كل ما يترتّب على ذلك من مخاطر الأخطاء. إذا كنت تبحث عن تحديث إدارتك، فإنّ اختيار الأداة المناسبة أمر أساسي — اكتشف كيف <a href="/blog/comment-choisir-logiciel-facturation-tunisie">تختار برنامج فوترة</a> يتناسب مع احتياجاتك.</p>
<h2>طرق تقييم المخزون</h2>
<p>يُحدّد تقييم المخزون كيفية حساب تكلفة البضائع المباعة وقيمة المخزون المتبقّي. في تونس، تُستخدم ثلاث طرق بشكل شائع:</p>
<ul>
<li><strong>طريقة FIFO (الوارد أولاً يصرف أولاً):</strong> تُباع أولى البضائع التي دخلت المخزون أولاً. تعكس هذه الطريقة الواقع بشكل جيد بالنسبة للمنتجات القابلة للتلف، وتوصي بها المعايير المحاسبية التونسية.</li>
<li><strong>طريقة LIFO (الوارد أخيرًا يصرف أولاً):</strong> تُباع آخر البضائع التي دخلت المخزون أولاً. أقل شيوعًا في تونس، لكنها قد تُستخدم في بعض القطاعات الصناعية.</li>
<li><strong>التكلفة المتوسطة المرجّحة (CMP):</strong> يُعاد حساب تكلفة الوحدة مع كل عملية إدخال جديدة للمخزون. وهي الطريقة الأسهل في التطبيق والأكثر انتشارًا بين المؤسسات الصغرى والمتوسطة التونسية.</li>
</ul>
<p>يعتمد اختيار الطريقة على طبيعة نشاطك ونظامك الجبائي. يُتيح لك برنامج إدارة مناسب ضبط الطريقة المرغوبة وحساب قيمة مخزونك تلقائيًا في الوقت الحقيقي.</p>
<h2>عتبات التنبيه وإعادة التموين</h2>
<p>انتظار نفاد المخزون لتمرير طلبية هو خطأ مكلف. يُتيح لك وضع عتبات تنبيه استباق احتياجاتك:</p>
<ol>
<li><strong>المخزون الأدنى:</strong> المستوى الذي يُطلَق عنده تنبيه إعادة التموين. يجب أن يُغطّي مهلة تسليم المورّد.</li>
<li><strong>مخزون الأمان:</strong> هامش إضافي لمواجهة الطوارئ (تأخّر المورّد، ذروة الطلب).</li>
<li><strong>المخزون الأقصى:</strong> السقف الذي لا ينبغي تجاوزه لتفادي التكديس المفرط وتكاليف التخزين غير الضرورية.</li>
</ol>
<p>عند ضبط هذه العتبات في برنامج الإدارة الخاص بك، تتلقّى إشعارات تلقائية فور بلوغ أي منتج مستوى حرجًا. وهذا يُمكّنك من تمرير طلبياتك في الوقت المناسب، لا مبكرًا جدًا ولا متأخرًا جدًا.</p>
<h2>التتبّع متعدّد المستودعات</h2>
<p>تعمل العديد من المؤسسات الصغرى والمتوسطة التونسية انطلاقًا من عدة نقاط تخزين: مستودع رئيسي، متجر، مخزن جهوي. دون متابعة مركزية، يُصبح من المستحيل معرفة مكان كل منتج بدقة.</p>
<p>يُتيح لك نظام متعدّد المستودعات:</p>
<ul>
<li>عرض المخزون المتاح حسب الموقع في الوقت الحقيقي</li>
<li>إجراء تحويلات بين المستودعات مع تتبّع كامل</li>
<li>تحسين توزيع البضائع وفقًا للطلب المحلي</li>
<li>تجنّب الطلبيات المزدوجة عندما يكون المنتج متوفرًا في مستودع آخر</li>
</ul>
<p>هذه الرؤية الشاملة تُمثّل ميزة تنافسية كبرى، خاصة للمؤسسات التي تُوزّع على كامل التراب التونسي.</p>
<h2>الجرد الفعلي وإدارة الفوارق</h2>
<p>الجرد الفعلي هو التزام قانوني في تونس. يتمثّل في العدّ الفعلي لجميع البضائع ومقارنة النتائج بالمخزون النظري المسجّل في النظام. يمكن أن تنتج الفوارق عن:</p>
<ul>
<li>أخطاء في الإدخال أثناء عمليات الدخول أو الخروج من المخزون</li>
<li>تلف أو إتلاف غير مسجّل</li>
<li>سرقة أو ضياع</li>
<li>أخطاء في تسليم المورّد</li>
</ul>
<p>يُسهّل برنامج إدارة المخزون الجيد عملية الجرد من خلال إنشاء بطاقات العدّ، وحساب الفوارق تلقائيًا، والسماح بالتعديلات مع المبرّرات. تربح الوقت وتبقى ملتزمًا بالتنظيمات التونسية.</p>
<h2>الأخطاء الشائعة في إدارة المخزون</h2>
<p>إليك أكثر الأخطاء شيوعًا التي ترتكبها المؤسسات الصغرى والمتوسطة التونسية في إدارة مخزونها:</p>
<ol>
<li><strong>عدم تحديث المخزون في الوقت الحقيقي:</strong> يجب تسجيل كل عملية دخول وخروج فورًا لتجنّب الاختلافات.</li>
<li><strong>تجاهل المنتجات ذات الدوران البطيء:</strong> هذه المنتجات تُجمّد رأس المال وتشغل مساحة. حدّدها وضع عروضًا ترويجية لتصريفها.</li>
<li><strong>عدم تدريب الموظفين:</strong> أداة متطوّرة لا تُجدي نفعًا إذا لم يكن الموظفون يعرفون كيفية استخدامها بشكل صحيح.</li>
<li><strong>خلط المخزون الشخصي بالمهني:</strong> خطأ شائع لدى أصحاب المشاريع الفردية في تونس يُعقّد المحاسبة.</li>
<li><strong>إهمال الجرد المنتظم:</strong> جرد سنوي واحد لا يكفي. خطّط لجرد دوري لاكتشاف الفوارق بسرعة.</li>
</ol>
<h2>الخلاصة — أتمت إدارة مخزونك مع SoftyFact</h2>
<p>لا ينبغي أن تكون إدارة المخزون مصدر قلق لمؤسستك. مع الأداة المناسبة، يمكنك تحويل هذا القيد إلى ميزة تنافسية. يُقدّم لك <a href="/product/offline">SoftyFact Bureau</a> حلاً شاملاً ومتكيّفًا مع السياق التونسي:</p>
<ul>
<li>إدارة متعدّدة المستودعات مع تحويلات وتتبّع كامل</li>
<li>تنبيهات تلقائية على عتبات المخزون (الأدنى والأقصى)</li>
<li>متابعة فورية لكل حركة مخزون</li>
<li>تقييم تلقائي حسب الطريقة التي تختارها (FIFO، التكلفة المتوسطة المرجّحة)</li>
<li>وحدة جرد فعلي مع إدارة الفوارق</li>
<li>يعمل بدون إنترنت — مثالي للمناطق ذات الاتصال غير المستقر</li>
</ul>
<p>لا تدع التقديرات التقريبية تُكلّف مؤسستك أموالاً. انتقل إلى إدارة مخزون احترافية اليوم مع <a href="/product/offline">SoftyFact Bureau</a>.</p>',
                'meta_description_fr' => 'Bonnes pratiques de gestion de stock pour PME tunisiennes. Méthodes, alertes et automatisation.',
                'meta_description_ar' => 'أفضل ممارسات إدارة المخزون للمؤسسات التونسية. الأساليب والتنبيهات والأتمتة.',
                'meta_keywords' => 'gestion stock tunisie, gestion stock PME, logiciel gestion stock',
                'cover_image' => '/screen/Gestion de stock.png',
                'reading_time' => 6,
                'published_at' => '2026-03-05 10:00:00',
            ],

            // ============================================================
            // POST 8 — Créer une facture conforme
            // ============================================================
            [
                'slug' => 'creer-facture-conforme-tunisie',
                'title_fr' => 'Comment créer une facture conforme en Tunisie',
                'title_ar' => 'كيفية إنشاء فاتورة مطابقة للمعايير في تونس',
                'excerpt_fr' => 'Les mentions obligatoires, les règles fiscales et les bonnes pratiques pour créer une facture conforme en Tunisie.',
                'excerpt_ar' => 'البيانات الإلزامية والقواعد الجبائية وأفضل الممارسات لإنشاء فاتورة مطابقة في تونس.',
                'body_fr' => '<p>En Tunisie, toute entreprise assujettie à la TVA doit émettre des factures respectant un cadre légal strict. Une facture non conforme peut entraîner des sanctions fiscales, le rejet de déductions TVA, voire des redressements. Ce guide détaille toutes les règles à connaître pour créer une facture conforme en Tunisie.</p>
<h2>1. Mentions obligatoires sur une facture tunisienne</h2>
<p>Selon le <strong>Code de la TVA</strong> et le <strong>Code de Commerce tunisien</strong>, chaque facture doit comporter les mentions suivantes :</p>
<ul>
<li><strong>Numéro séquentiel unique</strong> : chaque facture doit porter un numéro attribué dans un ordre chronologique continu, sans rupture ni doublon.</li>
<li><strong>Date d\'émission</strong> : la date à laquelle la facture est établie.</li>
<li><strong>Identité du vendeur</strong> : raison sociale, adresse complète et <strong>matricule fiscal</strong> (identifiant fiscal unique attribué par l\'administration tunisienne).</li>
<li><strong>Identité de l\'acheteur</strong> : nom ou raison sociale, adresse et matricule fiscal si l\'acheteur est assujetti.</li>
<li><strong>Désignation des biens ou services</strong> : description détaillée des marchandises livrées ou des services rendus, avec quantités et prix unitaires.</li>
<li><strong>Montant hors taxes (HT)</strong> : le total avant application de la TVA et autres taxes.</li>
<li><strong>Taux et montant de la TVA</strong> : le taux applicable (19 %, 13 % ou 7 %) et le montant correspondant.</li>
<li><strong><a href="/blog/timbre-fiscal-tunisie">Timbre fiscal</a></strong> : 1 DT ou 0,600 DT selon les conditions, à ajouter au total.</li>
<li><strong>Montant toutes taxes comprises (TTC)</strong> : le montant final à payer, incluant toutes les taxes et le timbre fiscal.</li>
</ul>
<p>L\'absence de l\'une de ces mentions peut invalider la facture aux yeux de l\'administration fiscale.</p>
<h2>2. Numérotation des factures</h2>
<p>La loi tunisienne exige une <strong>numérotation séquentielle et continue</strong>. Concrètement, cela signifie :</p>
<ul>
<li>Les numéros doivent se suivre sans interruption (1, 2, 3… et non 1, 3, 7).</li>
<li>Aucun numéro ne peut être supprimé ou réutilisé.</li>
<li>La série peut être réinitialisée chaque année fiscale, à condition d\'inclure l\'année dans le préfixe (ex. : FA-2026-001).</li>
</ul>
<p>Toute rupture dans la séquence peut faire l\'objet d\'un contrôle fiscal et être interprétée comme une dissimulation de chiffre d\'affaires.</p>
<h2>3. TVA et taxes spécifiques</h2>
<p>La <a href="/blog/guide-tva-tunisie">TVA en Tunisie</a> s\'applique à trois taux principaux :</p>
<ul>
<li><strong>19 %</strong> : taux normal, applicable à la majorité des biens et services.</li>
<li><strong>13 %</strong> : taux intermédiaire pour certains services (hôtellerie, transport…).</li>
<li><strong>7 %</strong> : taux réduit pour les produits de première nécessité et certaines activités.</li>
</ul>
<p>À cela peut s\'ajouter la <strong>FODEC à 1 %</strong> (Fonds de Développement de la Compétitivité Industrielle), applicable sur les produits industriels importés ou fabriqués localement. La facture doit clairement indiquer chaque taxe sur une ligne distincte pour permettre la déduction correcte par l\'acheteur.</p>
<h2>4. Timbre fiscal</h2>
<p>Le <a href="/blog/timbre-fiscal-tunisie">timbre fiscal</a> est un droit perçu sur les documents commerciaux en Tunisie :</p>
<ul>
<li><strong>1 DT</strong> par facture lorsque le paiement est effectué en espèces et que le montant TTC atteint un certain seuil.</li>
<li><strong>0,600 DT</strong> dans certains cas spécifiques définis par la réglementation.</li>
</ul>
<p>Le timbre fiscal n\'est pas applicable aux exportations ni aux transactions réglées exclusivement par virement bancaire ou chèque entre assujettis à la TVA. Il doit figurer comme une ligne distincte sur la facture, ajouté après le calcul de la TVA.</p>
<h2>5. Facture d\'avoir et rectifications</h2>
<p>Lorsqu\'une erreur est constatée sur une facture déjà émise, ou en cas de retour de marchandise, il est interdit de modifier ou supprimer la facture originale. Il faut émettre une <strong>facture d\'avoir</strong> (note de crédit) qui :</p>
<ul>
<li>Porte un numéro séquentiel propre à la série des avoirs.</li>
<li>Fait référence explicite à la facture originale (numéro et date).</li>
<li>Détaille les montants corrigés (HT, TVA, timbre fiscal le cas échéant, TTC).</li>
</ul>
<p>Une facture d\'avoir permet de régulariser la TVA et de maintenir la cohérence comptable exigée par l\'administration fiscale.</p>
<h2>6. Conservation des documents</h2>
<p>La législation tunisienne impose une <strong>obligation de conservation de 10 ans</strong> pour toutes les pièces comptables, y compris les factures émises et reçues. Cette durée court à partir de la date de clôture de l\'exercice concerné. Les documents peuvent être conservés sous forme papier ou numérique, à condition de garantir leur intégrité et leur lisibilité pendant toute la période.</p>
<p>Le non-respect de cette obligation expose l\'entreprise à des sanctions en cas de contrôle fiscal, car l\'administration peut rejeter les charges et déductions non justifiées par des pièces valides.</p>
<h2>7. Créez des factures conformes automatiquement avec SoftyFact</h2>
<p>Respecter toutes ces règles manuellement est source d\'erreurs et de perte de temps. <strong><a href="/product/offline">SoftyFact Bureau</a></strong> automatise l\'intégralité du processus :</p>
<ul>
<li>Génération automatique des numéros séquentiels sans rupture.</li>
<li>Calcul automatique de la TVA (19 %, 13 %, 7 %), de la FODEC et du timbre fiscal.</li>
<li>Toutes les mentions obligatoires pré-remplies et vérifiées.</li>
<li>Gestion des factures d\'avoir avec traçabilité complète.</li>
<li>Archivage numérique sécurisé conforme à l\'obligation de 10 ans.</li>
</ul>
<p>Avec SoftyFact, chaque facture que vous émettez est conforme à la réglementation tunisienne, sans effort supplémentaire. Concentrez-vous sur votre activité, SoftyFact s\'occupe de la conformité.</p>',
                'body_ar' => '<p>في تونس، يتعيّن على كل مؤسسة خاضعة للأداء على القيمة المضافة إصدار فواتير تحترم إطاراً قانونياً صارماً. فالفاتورة غير المطابقة قد تؤدي إلى عقوبات جبائية ورفض طرح الأداء على القيمة المضافة، بل وحتى تعديلات ضريبية. يشرح هذا الدليل جميع القواعد اللازمة لإنشاء فاتورة مطابقة في تونس.</p>
<h2>1. البيانات الإلزامية في الفاتورة التونسية</h2>
<p>وفقاً <strong>لمجلة الأداء على القيمة المضافة</strong> و<strong>المجلة التجارية التونسية</strong>، يجب أن تتضمن كل فاتورة البيانات التالية:</p>
<ul>
<li><strong>رقم تسلسلي فريد</strong>: يجب أن تحمل كل فاتورة رقماً مُخصصاً بترتيب زمني متواصل، دون انقطاع أو تكرار.</li>
<li><strong>تاريخ الإصدار</strong>: التاريخ الذي أُعدّت فيه الفاتورة.</li>
<li><strong>هوية البائع</strong>: الاسم التجاري، العنوان الكامل و<strong>المعرّف الجبائي</strong> (المعرّف الضريبي الفريد الممنوح من الإدارة التونسية).</li>
<li><strong>هوية المشتري</strong>: الاسم أو الاسم التجاري، العنوان والمعرّف الجبائي إن كان المشتري خاضعاً.</li>
<li><strong>وصف السلع أو الخدمات</strong>: وصف مفصّل للبضائع المسلّمة أو الخدمات المقدّمة، مع الكميات والأسعار الفردية.</li>
<li><strong>المبلغ دون احتساب الأداء</strong>: الإجمالي قبل تطبيق الأداء على القيمة المضافة والضرائب الأخرى.</li>
<li><strong>نسبة ومبلغ الأداء على القيمة المضافة</strong>: النسبة المطبّقة (19% أو 13% أو 7%) والمبلغ المقابل.</li>
<li><strong><a href="/blog/timbre-fiscal-tunisie">معلوم الطابع الجبائي</a></strong>: 1 دينار أو 0,600 دينار حسب الشروط، يُضاف إلى الإجمالي.</li>
<li><strong>المبلغ الإجمالي مع جميع الأداءات</strong>: المبلغ النهائي الواجب دفعه، شاملاً جميع الضرائب ومعلوم الطابع الجبائي.</li>
</ul>
<p>غياب أي بيان من هذه البيانات قد يُبطل الفاتورة أمام الإدارة الجبائية.</p>
<h2>2. ترقيم الفواتير</h2>
<p>يفرض القانون التونسي <strong>ترقيماً تسلسلياً ومتواصلاً</strong>. وهذا يعني عملياً:</p>
<ul>
<li>يجب أن تتتابع الأرقام دون انقطاع (1، 2، 3... وليس 1، 3، 7).</li>
<li>لا يمكن حذف أي رقم أو إعادة استخدامه.</li>
<li>يمكن إعادة تعيين السلسلة في كل سنة مالية، بشرط تضمين السنة في البادئة (مثال: FA-2026-001).</li>
</ul>
<p>أي انقطاع في التسلسل قد يكون محل مراقبة جبائية ويُفسَّر على أنه إخفاء لرقم المعاملات.</p>
<h2>3. الأداء على القيمة المضافة والضرائب الخاصة</h2>
<p>يُطبَّق <a href="/blog/guide-tva-tunisie">الأداء على القيمة المضافة في تونس</a> بثلاث نسب رئيسية:</p>
<ul>
<li><strong>19%</strong>: النسبة العادية، تُطبَّق على أغلب السلع والخدمات.</li>
<li><strong>13%</strong>: النسبة الوسيطة لبعض الخدمات (فندقة، نقل...).</li>
<li><strong>7%</strong>: النسبة المخفّضة للمواد الأساسية وبعض الأنشطة.</li>
</ul>
<p>يُضاف إلى ذلك <strong>معلوم صندوق تنمية القدرة التنافسية الصناعية (FODEC) بنسبة 1%</strong>، المطبّق على المنتجات الصناعية المستوردة أو المصنّعة محلياً. يجب أن تُبيّن الفاتورة كل ضريبة في سطر مستقل لتمكين المشتري من الطرح الصحيح.</p>
<h2>4. معلوم الطابع الجبائي</h2>
<p>معلوم <a href="/blog/timbre-fiscal-tunisie">الطابع الجبائي</a> هو حق يُستخلص على الوثائق التجارية في تونس:</p>
<ul>
<li><strong>1 دينار</strong> لكل فاتورة عندما يتم الدفع نقداً ويبلغ المبلغ الإجمالي حداً معيناً.</li>
<li><strong>0,600 دينار</strong> في بعض الحالات الخاصة المحددة بالتراتيب.</li>
</ul>
<p>لا يُطبَّق معلوم الطابع الجبائي على الصادرات ولا على المعاملات المسدّدة حصرياً بتحويل بنكي أو شيك بين الخاضعين للأداء على القيمة المضافة. يجب إدراجه كسطر مستقل في الفاتورة، يُضاف بعد احتساب الأداء على القيمة المضافة.</p>
<h2>5. إشعار الخصم (الفاتورة التعديلية) والتصحيحات</h2>
<p>عند اكتشاف خطأ في فاتورة صادرة سابقاً، أو في حالة إرجاع بضاعة، يُمنع تعديل الفاتورة الأصلية أو حذفها. يجب إصدار <strong>إشعار خصم</strong> (فاتورة تعديلية) يتضمن:</p>
<ul>
<li>رقماً تسلسلياً خاصاً بسلسلة إشعارات الخصم.</li>
<li>إشارة صريحة إلى الفاتورة الأصلية (الرقم والتاريخ).</li>
<li>تفصيل المبالغ المصحّحة (دون أداء، الأداء على القيمة المضافة، معلوم الطابع الجبائي إن وُجد، الإجمالي).</li>
</ul>
<p>يسمح إشعار الخصم بتسوية الأداء على القيمة المضافة والحفاظ على التناسق المحاسبي المطلوب من الإدارة الجبائية.</p>
<h2>6. حفظ الوثائق</h2>
<p>يفرض التشريع التونسي <strong>واجب حفظ لمدة 10 سنوات</strong> لجميع المستندات المحاسبية، بما في ذلك الفواتير الصادرة والواردة. تبدأ هذه المدة من تاريخ إقفال السنة المالية المعنية. يمكن حفظ الوثائق في شكل ورقي أو رقمي، بشرط ضمان سلامتها وقابليتها للقراءة طوال فترة الحفظ.</p>
<p>عدم الالتزام بهذا الواجب يُعرّض المؤسسة لعقوبات في حالة المراقبة الجبائية، إذ يمكن للإدارة رفض الأعباء والطروحات غير المدعومة بمستندات صالحة.</p>
<h2>7. أنشئ فواتير مطابقة تلقائياً مع SoftyFact</h2>
<p>احترام جميع هذه القواعد يدوياً مصدر للأخطاء وهدر للوقت. <strong><a href="/product/offline">SoftyFact Bureau</a></strong> يُؤتمت العملية بأكملها:</p>
<ul>
<li>توليد تلقائي للأرقام التسلسلية دون انقطاع.</li>
<li>احتساب تلقائي للأداء على القيمة المضافة (19%، 13%، 7%) وFODEC ومعلوم الطابع الجبائي.</li>
<li>جميع البيانات الإلزامية مُعبّأة مسبقاً ومُتحقّق منها.</li>
<li>إدارة إشعارات الخصم مع تتبع كامل.</li>
<li>أرشفة رقمية آمنة مطابقة لواجب الحفظ لمدة 10 سنوات.</li>
</ul>
<p>مع SoftyFact، كل فاتورة تُصدرها تكون مطابقة للتشريعات التونسية، دون أي جهد إضافي. ركّز على نشاطك، وSoftyFact يتكفّل بالامتثال.</p>',
                'meta_description_fr' => 'Créer une facture conforme en Tunisie : mentions obligatoires, TVA, timbre fiscal et numérotation.',
                'meta_description_ar' => 'إنشاء فاتورة مطابقة في تونس: البيانات الإلزامية والأداء ومعلوم الطابع الجبائي.',
                'meta_keywords' => 'facture conforme tunisie, mentions obligatoires facture, créer facture tunisie',
                'cover_image' => '/screen/gestion des Fournisseurs.png',
                'reading_time' => 6,
                'published_at' => '2026-03-10 10:00:00',
            ],

            // ============================================================
            // POST 9 — Timbre fiscal
            // ============================================================
            [
                'slug' => 'timbre-fiscal-tunisie',
                'title_fr' => 'Timbre fiscal en Tunisie : montants, application et exemptions',
                'title_ar' => 'معلوم الطابع الجبائي في تونس: المبالغ والتطبيق والإعفاءات',
                'excerpt_fr' => 'Tout savoir sur le timbre fiscal en Tunisie : montant de 1 DT, conditions d\'application et cas d\'exemption.',
                'excerpt_ar' => 'كل ما تحتاج معرفته عن معلوم الطابع الجبائي في تونس: مبلغ 1 دينار وشروط التطبيق والإعفاءات.',
                'body_fr' => '<p>Le timbre fiscal est une taxe souvent méconnue mais incontournable dans la facturation en Tunisie. Mal appliqué ou oublié, il peut entraîner des pénalités lors d\'un contrôle fiscal. Cet article vous explique tout ce qu\'il faut savoir sur le timbre fiscal tunisien : montants, conditions d\'application et exemptions.</p>
<h2>1. Qu\'est-ce que le timbre fiscal ?</h2>
<p>Le timbre fiscal en Tunisie est un <strong>droit de timbre</strong> prélevé sur les documents commerciaux et financiers. Il est régi par le <strong>Code des Droits d\'Enregistrement et de Timbre</strong>. Contrairement à la TVA qui est proportionnelle au montant de la transaction, le timbre fiscal est un montant fixe appliqué par document. Il concerne principalement les factures, reçus, quittances et autres documents attestant d\'un paiement.</p>
<p>Son objectif est de contribuer aux recettes de l\'État sur les transactions commerciales documentées. Toute entreprise émettant des factures en Tunisie doit connaître les règles du timbre fiscal pour rester en conformité.</p>
<h2>2. Montants applicables</h2>
<p>Les montants du timbre fiscal en Tunisie sont fixés comme suit :</p>
<ul>
<li><strong>1 DT (1 000 millimes)</strong> : c\'est le montant standard applicable sur la plupart des factures commerciales lorsque le montant TTC atteint ou dépasse un certain seuil et que le paiement est effectué en espèces.</li>
<li><strong>0,600 DT (600 millimes)</strong> : ce montant réduit s\'applique dans des cas spécifiques définis par la réglementation, notamment pour certains types de documents ou de transactions à montant inférieur.</li>
</ul>
<p>Le timbre fiscal s\'ajoute <strong>après le calcul de la TVA</strong> et figure comme une ligne distincte sur la facture. Il fait partie intégrante du montant TTC final que le client doit régler.</p>
<h2>3. Quand appliquer le timbre fiscal</h2>
<p>Le timbre fiscal doit être appliqué dans les situations suivantes :</p>
<ul>
<li><strong>Ventes au comptant (espèces)</strong> : toute facture réglée en espèces est soumise au timbre fiscal.</li>
<li><strong>Factures dépassant un certain seuil</strong> : les factures dont le montant TTC dépasse le seuil réglementaire sont assujetties au droit de timbre.</li>
<li><strong>Reçus et quittances</strong> : les documents attestant la réception d\'un paiement en espèces sont également concernés.</li>
</ul>
<p>En pratique, le timbre fiscal s\'applique sur la grande majorité des factures émises aux clients finaux (particuliers) qui paient en espèces. Pour les entreprises, la situation dépend du mode de paiement utilisé.</p>
<h2>4. Exemptions du timbre fiscal</h2>
<p>Certaines transactions sont <strong>exemptées</strong> du timbre fiscal :</p>
<ul>
<li><strong>Exportations</strong> : les factures liées à des opérations d\'exportation sont exonérées du droit de timbre.</li>
<li><strong>Transactions entre assujettis à la TVA</strong> : lorsque le paiement est effectué par virement bancaire, chèque ou effet de commerce entre deux entités assujetties à la TVA, le timbre fiscal ne s\'applique pas.</li>
<li><strong>Paiements électroniques</strong> : dans certains cas définis par la réglementation, les paiements effectués par voie électronique peuvent bénéficier d\'une exemption.</li>
<li><strong>Certains documents administratifs</strong> : des catégories spécifiques de documents peuvent être exemptées selon les dispositions légales en vigueur.</li>
</ul>
<p>Il est essentiel de bien vérifier si votre situation correspond à une exemption avant de décider de ne pas appliquer le timbre fiscal.</p>
<h2>5. Erreurs courantes liées au timbre fiscal</h2>
<p>Voici les erreurs les plus fréquentes commises par les entreprises tunisiennes :</p>
<ul>
<li><strong>Oublier le timbre fiscal</strong> : c\'est l\'erreur la plus courante. Beaucoup d\'entreprises omettent simplement d\'ajouter le timbre sur leurs factures, s\'exposant à des redressements fiscaux.</li>
<li><strong>Appliquer le timbre quand il ne faut pas</strong> : à l\'inverse, certaines entreprises ajoutent systématiquement le timbre fiscal même sur des factures exemptées (exports, paiements par virement entre assujettis), ce qui surcharge inutilement leurs clients.</li>
<li><strong>Ne pas le distinguer sur la facture</strong> : le timbre fiscal doit apparaître sur une ligne séparée. L\'intégrer dans le montant HT ou la TVA est une erreur qui peut poser problème en cas de contrôle.</li>
<li><strong>Confondre les montants</strong> : appliquer 0,600 DT au lieu de 1 DT, ou inversement, selon le type de transaction.</li>
</ul>
<p>Ces erreurs, même involontaires, peuvent coûter cher lors d\'un contrôle fiscal. Il est donc crucial de maîtriser les règles ou de s\'appuyer sur un outil fiable.</p>
<h2>6. SoftyFact calcule automatiquement le timbre fiscal</h2>
<p>Avec <strong><a href="/product/offline">SoftyFact Bureau</a></strong>, vous n\'avez plus à vous soucier du timbre fiscal. Le logiciel applique automatiquement les règles en vigueur :</p>
<ul>
<li>Détection automatique des conditions d\'application du timbre fiscal.</li>
<li>Calcul du montant correct (1 DT ou 0,600 DT) selon le type de transaction.</li>
<li>Affichage sur une ligne distincte dans la facture, conforme aux exigences légales.</li>
<li>Exemption automatique pour les cas non concernés (exports, virements entre assujettis).</li>
</ul>
<p>Créez des <a href="/blog/creer-facture-conforme-tunisie">factures conformes</a> en toute sérénité. SoftyFact élimine les erreurs liées au timbre fiscal et vous garantit une conformité totale avec la réglementation tunisienne.</p>',
                'body_ar' => '<p>معلوم الطابع الجبائي ضريبة غالباً ما تكون مجهولة لكنها أساسية في الفوترة بتونس. إذا طُبّق بشكل خاطئ أو نُسي، قد يؤدي إلى عقوبات خلال المراقبة الجبائية. يوضّح هذا المقال كل ما تحتاج معرفته عن معلوم الطابع الجبائي التونسي: المبالغ، شروط التطبيق والإعفاءات.</p>
<h2>1. ما هو معلوم الطابع الجبائي؟</h2>
<p>معلوم الطابع الجبائي في تونس هو <strong>حق طابع</strong> يُستخلص على الوثائق التجارية والمالية. يخضع <strong>لمجلة حقوق التسجيل والطابع</strong>. على عكس الأداء على القيمة المضافة الذي يتناسب مع مبلغ المعاملة، فإن معلوم الطابع الجبائي مبلغ ثابت يُطبّق على كل وثيقة. يتعلّق أساساً بالفواتير والإيصالات والمخالصات وغيرها من الوثائق المثبتة لعملية دفع.</p>
<p>هدفه المساهمة في إيرادات الدولة على المعاملات التجارية الموثّقة. يتعيّن على كل مؤسسة تُصدر فواتير في تونس معرفة قواعد معلوم الطابع الجبائي للبقاء في وضع مطابق.</p>
<h2>2. المبالغ المطبّقة</h2>
<p>مبالغ معلوم الطابع الجبائي في تونس محدّدة كالتالي:</p>
<ul>
<li><strong>1 دينار (1000 مليم)</strong>: هو المبلغ المعياري المطبّق على أغلب الفواتير التجارية عندما يبلغ المبلغ الإجمالي حداً معيناً أو يتجاوزه ويكون الدفع نقداً.</li>
<li><strong>0,600 دينار (600 مليم)</strong>: هذا المبلغ المخفّض يُطبّق في حالات خاصة محدّدة بالتراتيب، خاصة لبعض أنواع الوثائق أو المعاملات ذات المبلغ الأدنى.</li>
</ul>
<p>يُضاف معلوم الطابع الجبائي <strong>بعد احتساب الأداء على القيمة المضافة</strong> ويظهر كسطر مستقل في الفاتورة. وهو جزء لا يتجزأ من المبلغ الإجمالي النهائي الذي يجب على الحريف تسديده.</p>
<h2>3. متى يُطبَّق معلوم الطابع الجبائي</h2>
<p>يجب تطبيق معلوم الطابع الجبائي في الحالات التالية:</p>
<ul>
<li><strong>البيع نقداً</strong>: كل فاتورة مسدّدة نقداً تخضع لمعلوم الطابع الجبائي.</li>
<li><strong>الفواتير التي تتجاوز حداً معيناً</strong>: الفواتير التي يتجاوز مبلغها الإجمالي العتبة التنظيمية تخضع لحق الطابع.</li>
<li><strong>الإيصالات والمخالصات</strong>: الوثائق المثبتة لاستلام دفعة نقدية معنية أيضاً.</li>
</ul>
<p>عملياً، يُطبَّق معلوم الطابع الجبائي على الغالبية العظمى من الفواتير الصادرة للحرفاء النهائيين (الأفراد) الذين يدفعون نقداً. بالنسبة للمؤسسات، يتوقف الأمر على طريقة الدفع المستعملة.</p>
<h2>4. الإعفاءات من معلوم الطابع الجبائي</h2>
<p>بعض المعاملات <strong>معفاة</strong> من معلوم الطابع الجبائي:</p>
<ul>
<li><strong>التصدير</strong>: الفواتير المتعلقة بعمليات التصدير معفاة من حق الطابع.</li>
<li><strong>المعاملات بين الخاضعين للأداء على القيمة المضافة</strong>: عندما يتم الدفع بتحويل بنكي أو شيك أو كمبيالة بين كيانين خاضعين للأداء على القيمة المضافة، لا يُطبَّق معلوم الطابع الجبائي.</li>
<li><strong>الدفع الإلكتروني</strong>: في بعض الحالات المحدّدة بالتراتيب، يمكن أن تستفيد المدفوعات الإلكترونية من إعفاء.</li>
<li><strong>بعض الوثائق الإدارية</strong>: فئات محدّدة من الوثائق يمكن إعفاؤها وفقاً للأحكام القانونية السارية.</li>
</ul>
<p>من الضروري التحقق جيداً ممّا إذا كانت حالتكم تندرج ضمن إعفاء قبل اتخاذ قرار عدم تطبيق معلوم الطابع الجبائي.</p>
<h2>5. الأخطاء الشائعة المتعلقة بمعلوم الطابع الجبائي</h2>
<p>فيما يلي الأخطاء الأكثر شيوعاً التي ترتكبها المؤسسات التونسية:</p>
<ul>
<li><strong>نسيان معلوم الطابع الجبائي</strong>: هذا الخطأ الأكثر شيوعاً. كثير من المؤسسات تغفل ببساطة عن إضافة الطابع على فواتيرها، ممّا يُعرّضها لتعديلات جبائية.</li>
<li><strong>تطبيق الطابع حين لا ينبغي ذلك</strong>: في المقابل، بعض المؤسسات تُضيف معلوم الطابع الجبائي بشكل منهجي حتى على الفواتير المعفاة (تصدير، تحويلات بين خاضعين)، ممّا يُثقل كاهل حرفائها دون داعٍ.</li>
<li><strong>عدم تمييزه في الفاتورة</strong>: يجب أن يظهر معلوم الطابع الجبائي في سطر مستقل. إدماجه في المبلغ دون أداء أو الأداء على القيمة المضافة خطأ قد يُسبّب مشاكل عند المراقبة.</li>
<li><strong>الخلط بين المبالغ</strong>: تطبيق 0,600 دينار بدل 1 دينار أو العكس، حسب نوع المعاملة.</li>
</ul>
<p>هذه الأخطاء، حتى وإن كانت غير مقصودة، قد تكلّف غالياً خلال المراقبة الجبائية. لذا من الضروري إتقان القواعد أو الاعتماد على أداة موثوقة.</p>
<h2>6. SoftyFact يحتسب معلوم الطابع الجبائي تلقائياً</h2>
<p>مع <strong><a href="/product/offline">SoftyFact Bureau</a></strong>، لم يعد عليكم القلق بشأن معلوم الطابع الجبائي. البرنامج يُطبّق القواعد السارية تلقائياً:</p>
<ul>
<li>كشف تلقائي لشروط تطبيق معلوم الطابع الجبائي.</li>
<li>احتساب المبلغ الصحيح (1 دينار أو 0,600 دينار) حسب نوع المعاملة.</li>
<li>عرضه في سطر مستقل في الفاتورة، مطابقاً للمتطلبات القانونية.</li>
<li>إعفاء تلقائي للحالات غير المعنية (تصدير، تحويلات بين خاضعين).</li>
</ul>
<p>أنشئ <a href="/blog/creer-facture-conforme-tunisie">فواتير مطابقة</a> بكل اطمئنان. SoftyFact يُزيل الأخطاء المتعلقة بمعلوم الطابع الجبائي ويضمن لكم امتثالاً كاملاً للتشريعات التونسية.</p>',
                'meta_description_fr' => 'Timbre fiscal en Tunisie : montant 1 DT, quand l\'appliquer et les exemptions. Guide pratique.',
                'meta_description_ar' => 'معلوم الطابع الجبائي في تونس: المبلغ 1 دينار ومتى يطبق والإعفاءات.',
                'meta_keywords' => 'timbre fiscal tunisie, droit de timbre tunisie, timbre 1 DT',
                'cover_image' => '/screen/gestion Paiements (encaissements et décaissements).png',
                'reading_time' => 5,
                'published_at' => '2026-03-15 10:00:00',
            ],

            // ============================================================
            // POST 10 — Comparatif gratuit vs payant
            // ============================================================
            [
                'slug' => 'comparatif-logiciel-facturation-gratuit-vs-payant',
                'title_fr' => 'Comparatif : logiciel de facturation gratuit vs payant en Tunisie',
                'title_ar' => 'مقارنة: برنامج فوترة مجاني مقابل مدفوع في تونس',
                'excerpt_fr' => 'Faut-il opter pour un logiciel de facturation gratuit ou payant en Tunisie ? Comparatif objectif des avantages et limites.',
                'excerpt_ar' => 'هل يجب اختيار برنامج فوترة مجاني أو مدفوع في تونس؟ مقارنة موضوعية للمزايا والحدود.',
                'body_fr' => '<p>Quand on lance son activité en Tunisie, la question du logiciel de facturation se pose rapidement. Faut-il opter pour une solution gratuite ou investir dans un logiciel payant ? Ce comparatif vous aide à faire le bon choix en analysant les avantages et limites de chaque option.</p>
<h2>1. Logiciels gratuits : que proposent-ils vraiment ?</h2>
<p>Les solutions gratuites de facturation en Tunisie se résument généralement à :</p>
<ul>
<li><strong>Microsoft Excel ou Google Sheets</strong> : des modèles de factures téléchargeables, sans aucune automatisation. Vous saisissez manuellement chaque donnée.</li>
<li><strong>Outils basiques en ligne</strong> : des générateurs de factures simples qui produisent un PDF, sans gestion de clients, de stock ni de suivi des paiements.</li>
<li><strong>Logiciels open source généralistes</strong> : non adaptés à la réglementation tunisienne, ils nécessitent des compétences techniques pour être configurés.</li>
</ul>
<p>Ces outils peuvent suffire pour émettre quelques factures occasionnelles, mais ils montrent vite leurs limites dès que l\'activité se développe.</p>
<h2>2. Les limites des solutions gratuites</h2>
<p>Les logiciels gratuits présentent des lacunes critiques pour une entreprise tunisienne :</p>
<ul>
<li><strong>Pas de gestion de la TVA tunisienne</strong> : aucun calcul automatique des taux 19 %, 13 % ou 7 %, ni de la FODEC.</li>
<li><strong>Pas de timbre fiscal</strong> : le timbre fiscal (1 DT ou 0,600 DT) n\'est jamais géré automatiquement.</li>
<li><strong>Pas de gestion de stock</strong> : impossible de suivre les entrées, sorties et niveaux de stock.</li>
<li><strong>Pas de numérotation séquentielle garantie</strong> : risque de doublons ou de ruptures dans la numérotation.</li>
<li><strong>Aucun support technique</strong> : en cas de problème, vous êtes seul.</li>
<li><strong>Risque sur les données</strong> : fichiers Excel corrompus, pas de sauvegarde automatique, données non sécurisées.</li>
<li><strong>Pas de mise à jour réglementaire</strong> : si la loi change, votre outil ne s\'adapte pas.</li>
</ul>
<p>Pour une entreprise soumise à des obligations fiscales strictes, ces limites représentent un risque réel de non-conformité.</p>
<h2>3. Ce qu\'apporte un logiciel payant</h2>
<p>Un logiciel de facturation payant conçu pour le marché tunisien offre des avantages décisifs :</p>
<ul>
<li><strong>Conformité fiscale complète</strong> : TVA multi-taux, FODEC, timbre fiscal, mentions obligatoires — tout est calculé et affiché automatiquement.</li>
<li><strong>Gestion multi-taxes</strong> : application correcte de plusieurs taxes sur une même facture.</li>
<li><strong>Gestion de stock intégrée</strong> : suivi en temps réel des mouvements de stock.</li>
<li><strong>Rapports et tableaux de bord</strong> : chiffre d\'affaires, marges, états fiscaux, tout est accessible en quelques clics.</li>
<li><strong>Mises à jour régulières</strong> : adaptation automatique aux changements de la réglementation tunisienne.</li>
<li><strong>Support technique</strong> : une équipe disponible pour répondre à vos questions.</li>
<li><strong>Sécurité des données</strong> : sauvegardes automatiques et protection des informations.</li>
</ul>
<h2>4. Tableau comparatif : gratuit vs payant</h2>
<table>
<thead>
<tr><th>Fonctionnalité</th><th>Gratuit (Excel / outils basiques)</th><th>Payant (SoftyFact)</th></tr>
</thead>
<tbody>
<tr><td>TVA tunisienne (19%, 13%, 7%)</td><td>Calcul manuel</td><td>Automatique</td></tr>
<tr><td>FODEC (1%)</td><td>Non géré</td><td>Automatique</td></tr>
<tr><td>Timbre fiscal</td><td>Non géré</td><td>Automatique</td></tr>
<tr><td>Numérotation séquentielle</td><td>Manuelle, risque d\'erreur</td><td>Automatique, sans rupture</td></tr>
<tr><td>Gestion des clients</td><td>Limitée ou absente</td><td>Complète avec historique</td></tr>
<tr><td>Gestion de stock</td><td>Non disponible</td><td>Intégrée en temps réel</td></tr>
<tr><td>Factures d\'avoir</td><td>Gestion manuelle</td><td>Automatisée avec traçabilité</td></tr>
<tr><td>Rapports fiscaux</td><td>Non disponibles</td><td>Générés automatiquement</td></tr>
<tr><td>Support technique</td><td>Aucun</td><td>Inclus</td></tr>
<tr><td>Mises à jour réglementaires</td><td>Aucune</td><td>Automatiques</td></tr>
<tr><td>Sécurité des données</td><td>Faible (fichiers locaux)</td><td>Sauvegardes sécurisées</td></tr>
<tr><td>Mode hors connexion</td><td>Excel uniquement</td><td>Oui (<a href="/product/offline">SoftyFact Bureau</a>)</td></tr>
<tr><td>Mode cloud</td><td>Google Sheets limité</td><td>Oui (<a href="/product/online">SoftyFact Cloud</a>)</td></tr>
</tbody>
</table>
<h2>5. Le vrai coût d\'un logiciel « gratuit »</h2>
<p>Un logiciel gratuit semble économique, mais les coûts cachés sont considérables :</p>
<ul>
<li><strong>Temps perdu</strong> : saisie manuelle, vérifications, corrections d\'erreurs — des heures chaque semaine qui pourraient être consacrées à votre activité.</li>
<li><strong>Erreurs de calcul</strong> : une TVA mal calculée ou un timbre fiscal oublié peut avoir des conséquences financières importantes.</li>
<li><strong>Pénalités fiscales</strong> : une facture non conforme peut entraîner des amendes et des redressements lors d\'un contrôle fiscal.</li>
<li><strong>Perte de données</strong> : un fichier Excel corrompu sans sauvegarde peut faire perdre des mois de comptabilité.</li>
<li><strong>Image non professionnelle</strong> : des factures mal présentées ou incomplètes nuisent à la crédibilité de votre entreprise.</li>
</ul>
<p>Au final, le « gratuit » coûte souvent bien plus cher qu\'un abonnement à un logiciel professionnel. Pour <a href="/blog/comment-choisir-logiciel-facturation-tunisie">choisir un logiciel</a> de facturation, il faut considérer le coût total, pas seulement le prix affiché.</p>
<h2>6. SoftyFact offre le meilleur rapport qualité-prix</h2>
<p><strong>SoftyFact</strong> a été conçu spécifiquement pour les entreprises tunisiennes qui recherchent un outil fiable, complet et abordable :</p>
<ul>
<li><strong><a href="/product/offline">SoftyFact Bureau</a></strong> : installez-le sur votre ordinateur et travaillez même sans connexion internet. Idéal pour les commerces et artisans.</li>
<li><strong><a href="/product/online">SoftyFact Cloud</a></strong> : accédez à vos factures depuis n\'importe où, avec synchronisation en temps réel. Parfait pour les équipes et les entreprises multi-sites.</li>
</ul>
<p>Avec une conformité fiscale totale, une interface en français et en arabe, et un prix adapté au marché tunisien, SoftyFact élimine les risques et les coûts cachés des solutions gratuites. Faites le choix de la tranquillité et de la conformité.</p>',
                'body_ar' => '<p>عند انطلاق نشاطك في تونس، تُطرح مسألة برنامج الفوترة بسرعة. هل تختار حلاً مجانياً أم تستثمر في برنامج مدفوع؟ هذه المقارنة تساعدك على اتخاذ القرار الصحيح من خلال تحليل مزايا وحدود كل خيار.</p>
<h2>1. البرامج المجانية: ماذا تقدّم فعلاً؟</h2>
<p>الحلول المجانية للفوترة في تونس تتلخّص عموماً في:</p>
<ul>
<li><strong>Microsoft Excel أو Google Sheets</strong>: نماذج فواتير قابلة للتحميل، دون أي أتمتة. تُدخل كل بيان يدوياً.</li>
<li><strong>أدوات أساسية عبر الإنترنت</strong>: مولّدات فواتير بسيطة تنتج ملف PDF، دون إدارة حرفاء أو مخزون أو متابعة مدفوعات.</li>
<li><strong>برامج مفتوحة المصدر عامة</strong>: غير مُكيّفة مع التشريعات التونسية، وتتطلب مهارات تقنية لتهيئتها.</li>
</ul>
<p>هذه الأدوات قد تكفي لإصدار بضع فواتير عرضية، لكنها تُظهر حدودها سريعاً بمجرد تطوّر النشاط.</p>
<h2>2. حدود الحلول المجانية</h2>
<p>البرامج المجانية تعاني من ثغرات حرجة بالنسبة لمؤسسة تونسية:</p>
<ul>
<li><strong>لا إدارة للأداء على القيمة المضافة التونسي</strong>: لا احتساب تلقائي لنِسب 19% أو 13% أو 7%، ولا لمعلوم FODEC.</li>
<li><strong>لا معلوم طابع جبائي</strong>: معلوم الطابع الجبائي (1 دينار أو 0,600 دينار) لا يُدار أبداً تلقائياً.</li>
<li><strong>لا إدارة مخزون</strong>: استحالة متابعة المداخيل والمخارج ومستويات المخزون.</li>
<li><strong>لا ترقيم تسلسلي مضمون</strong>: خطر التكرار أو الانقطاع في الترقيم.</li>
<li><strong>لا دعم تقني</strong>: في حالة مشكل، أنت وحدك.</li>
<li><strong>خطر على البيانات</strong>: ملفات Excel تالفة، لا نسخ احتياطي تلقائي، بيانات غير مؤمّنة.</li>
<li><strong>لا تحديث تنظيمي</strong>: إذا تغيّر القانون، أداتك لا تتكيّف.</li>
</ul>
<p>بالنسبة لمؤسسة خاضعة لالتزامات جبائية صارمة، هذه الحدود تمثّل خطراً حقيقياً لعدم المطابقة.</p>
<h2>3. ما يُقدّمه البرنامج المدفوع</h2>
<p>برنامج فوترة مدفوع مصمّم للسوق التونسي يوفّر مزايا حاسمة:</p>
<ul>
<li><strong>امتثال جبائي كامل</strong>: أداء على القيمة المضافة متعدد النِسب، FODEC، معلوم الطابع الجبائي، البيانات الإلزامية — كل شيء يُحتسب ويُعرض تلقائياً.</li>
<li><strong>إدارة متعددة الضرائب</strong>: تطبيق صحيح لعدة ضرائب على نفس الفاتورة.</li>
<li><strong>إدارة مخزون مدمجة</strong>: متابعة آنية لحركات المخزون.</li>
<li><strong>تقارير ولوحات قيادة</strong>: رقم المعاملات، الهوامش، الوضعيات الجبائية، كل شيء متاح ببضع نقرات.</li>
<li><strong>تحديثات منتظمة</strong>: تكيّف تلقائي مع تغييرات التشريعات التونسية.</li>
<li><strong>دعم تقني</strong>: فريق متوفّر للإجابة على أسئلتكم.</li>
<li><strong>أمان البيانات</strong>: نسخ احتياطي تلقائي وحماية المعلومات.</li>
</ul>
<h2>4. جدول مقارنة: مجاني مقابل مدفوع</h2>
<table>
<thead>
<tr><th>الميزة</th><th>مجاني (Excel / أدوات أساسية)</th><th>مدفوع (SoftyFact)</th></tr>
</thead>
<tbody>
<tr><td>الأداء على القيمة المضافة (19%، 13%، 7%)</td><td>احتساب يدوي</td><td>تلقائي</td></tr>
<tr><td>FODEC (1%)</td><td>غير مُدار</td><td>تلقائي</td></tr>
<tr><td>معلوم الطابع الجبائي</td><td>غير مُدار</td><td>تلقائي</td></tr>
<tr><td>ترقيم تسلسلي</td><td>يدوي، خطر خطأ</td><td>تلقائي، دون انقطاع</td></tr>
<tr><td>إدارة الحرفاء</td><td>محدودة أو غائبة</td><td>كاملة مع السجل</td></tr>
<tr><td>إدارة المخزون</td><td>غير متوفرة</td><td>مدمجة في الوقت الفعلي</td></tr>
<tr><td>إشعارات الخصم</td><td>إدارة يدوية</td><td>مؤتمتة مع التتبع</td></tr>
<tr><td>التقارير الجبائية</td><td>غير متوفرة</td><td>تُولّد تلقائياً</td></tr>
<tr><td>الدعم التقني</td><td>لا يوجد</td><td>مشمول</td></tr>
<tr><td>التحديثات التنظيمية</td><td>لا توجد</td><td>تلقائية</td></tr>
<tr><td>أمان البيانات</td><td>ضعيف (ملفات محلية)</td><td>نسخ احتياطي مؤمّن</td></tr>
<tr><td>وضع بدون اتصال</td><td>Excel فقط</td><td>نعم (<a href="/product/offline">SoftyFact Bureau</a>)</td></tr>
<tr><td>وضع سحابي</td><td>Google Sheets محدود</td><td>نعم (<a href="/product/online">SoftyFact Cloud</a>)</td></tr>
</tbody>
</table>
<h2>5. التكلفة الحقيقية للبرنامج « المجاني »</h2>
<p>البرنامج المجاني يبدو اقتصادياً، لكن التكاليف الخفية كبيرة:</p>
<ul>
<li><strong>وقت ضائع</strong>: إدخال يدوي، تحققات، تصحيح أخطاء — ساعات كل أسبوع كان يمكن تخصيصها لنشاطك.</li>
<li><strong>أخطاء حسابية</strong>: أداء على القيمة المضافة محتسب بشكل خاطئ أو معلوم طابع جبائي منسي قد تكون لهما عواقب مالية كبيرة.</li>
<li><strong>عقوبات جبائية</strong>: فاتورة غير مطابقة قد تؤدي إلى غرامات وتعديلات خلال المراقبة الجبائية.</li>
<li><strong>فقدان البيانات</strong>: ملف Excel تالف دون نسخ احتياطي قد يُضيّع أشهراً من المحاسبة.</li>
<li><strong>صورة غير مهنية</strong>: فواتير سيئة العرض أو ناقصة تُضعف مصداقية مؤسستك.</li>
</ul>
<p>في المحصلة، « المجاني » يكلّف غالباً أكثر بكثير من اشتراك في برنامج مهني. <a href="/blog/comment-choisir-logiciel-facturation-tunisie">لاختيار برنامج</a> فوترة، يجب النظر في التكلفة الإجمالية، وليس فقط السعر المعروض.</p>
<h2>6. SoftyFact يقدّم أفضل نسبة جودة-سعر</h2>
<p><strong>SoftyFact</strong> صُمّم خصيصاً للمؤسسات التونسية التي تبحث عن أداة موثوقة وشاملة وبسعر معقول:</p>
<ul>
<li><strong><a href="/product/offline">SoftyFact Bureau</a></strong>: ثبّته على حاسوبك واعمل حتى بدون اتصال بالإنترنت. مثالي للتجار والحرفيين.</li>
<li><strong><a href="/product/online">SoftyFact Cloud</a></strong>: ادخل إلى فواتيرك من أي مكان، مع مزامنة آنية. مثالي للفِرق والمؤسسات متعددة المواقع.</li>
</ul>
<p>مع امتثال جبائي كامل، واجهة بالفرنسية والعربية، وسعر مُكيّف مع السوق التونسي، SoftyFact يُزيل المخاطر والتكاليف الخفية للحلول المجانية. اختر الطمأنينة والامتثال.</p>',
                'meta_description_fr' => 'Comparatif logiciel facturation gratuit vs payant en Tunisie. Avantages, limites et recommandations.',
                'meta_description_ar' => 'مقارنة برنامج فوترة مجاني مقابل مدفوع في تونس. المزايا والحدود والتوصيات.',
                'meta_keywords' => 'logiciel facturation gratuit tunisie, comparatif facturation, logiciel facturation payant',
                'cover_image' => '/screen/gestion des Entrepôts .png',
                'reading_time' => 7,
                'published_at' => '2026-03-20 10:00:00',
            ],

        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
