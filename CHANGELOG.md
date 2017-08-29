# PxSemantic Changelog

2.4.0 - 2017-08-01
------------------
* [FEATURE] Switch string $contraint to array $constraints in ApiController->listAction() to allow multiple constraints
* [BUGFIX] Force absolute URIs

2.3.1 - 2017-07-26
------------------
* [BUGFIX] fixes typo in ApiController->showAction()
* [BUGFIX] updates TypoScriptProcessor->process() - fixes entity property getter and setter calls

2.3.1 - 2017-08-03
------------------
* [TASK] Changes dep versions in `ext_emconf.php` and `composer.json` for TYPO3 8 Compatibility
* [BUGFIX] Changes the properties "weight" and "height" to type QuantitativeValue for schema.org compliance

2.3.0 - 2017-05-31
------------------
* [TASK] Adds many new entities from schema.org via api-platform schema-generator
* [BUGFIX] Fix bug where resource id was not retrieved correctly via TS

2.2.0 - 2017-03-20
------------------
* [BUGFIX] Fix bug which occurs when caching was disabled for HYDRA REST requests 
* [TASK] PSR-2 compatibility
* [TASK] Add NewsArticle entity --> [schema.org/NewsArticle](http://schema.org/NewsArticle)

2.1.0 - 2016-11-11
------------------
* [FEATURE] Add cache tagging feature for cached rest requests for better cache invalidation
  * only works for resources which uses `pages` table as base
  * cache invalidation for other record types is even more complicated (coming soon)

2.0.0 - 2016-11-11
------------------
* [FEATURE] Introduces HYDRA Web API Feature for Linked Data Web API´s with TYPO3
* [TASK] Removes dependency for EXT:vhs, instead we render jsonld output via `JsonView` class of extbase 
  core
* [TASK] adds some more properties to [schema.org](http://schema.org/) entities
  
1.5.0 - 2016-10-06
------------------
* [TASK] generates new SchemaOrg Entities
* [TASK] reformats code to PSR-0 / 1 
* [TASK] replaces traditional array syntax with shorthand syntax
* [BUGFIX] changes mainEntityOfPage to string and therefore only adds the current url for this property in 
  `PageProcessor`
  
1.4.0 - 2016-05-23
------------------
* refactors special typoscript objects like PX_SEMANTIC_ARRAY
    * we now have one `typoscriptTypeConverter` class for each special type
    * that makes it even easier to develop own custom `typoscriptTypeConverter` classes
        * own custom `typoscriptTypeConverter` just have to implement `Portrino\PxSemantic\Converter\TypoScriptTypeConverterInterface`
    * in conjunction we add `Portrino\PxSemantic\Converter\DateTimeConverter` to set DateTime via typoscript config
* adds some more properties to [schema.org](http://schema.org/) entities
    * QuantitativeValue
    * Person
    
1.3.0 - 2016-05-17
------------------
* adds the following [schema.org](http://schema.org/) entities
    * AdministrativeArea
    * Country
    * Person
    * Place
    * SportsOrganization
    * SportsTeam
* fixes some stuff in PageProcessor

1.2.3 - 2016-05-03
------------------
* removes require `typo3-ter/vhs` from composer.json and moves it to suggest part to prevent exception in Extension 
  Manager unter TYPO3 6.2
  * this problem was described in [#54491](https://forge.typo3.org/issues/54491) 
* adds anonymous function call around commands in `extTables.php` and `ext_localconf.php`
* adds ext_icon.png to get icon in TER

1.2.2 - 2016-03-03
------------------
* removes repository from composer.json

1.2.1 - 2016-03-03
------------------
* sets vhs dep to `"typo3-ter/vhs": "2.4.*"` in composer.json

1.2.0 - 2016-02-24
------------------
* adds the abstract class `AbstractProcessor` which should now be used as parent class for Processor classes
    * it enables: easy use of entityId which was introduced in this version
* adds some new classes from http://schema.org/
    * Answer, Comment, Question
    * CollectionPage, QAPage, ItemPage, SearchResultsPage
* adds some new properties to classes from http://schema.org/
* updates `schema.yml` in conjunction
* fixes a bug in `TypoScriptProcessor` which overrides a subEntity even if it is instantiated already from some 
  Processor before
* adds some functionality to `PageProcessor`
    * set `headline` to title of the page
    * set `name` to navTitle of the page
    * set `mainEntityOfPage` and set the url to the current page url
* adds class `Portrino\PxSemantic\Core\Bootstrap` which extends `\TYPO3\CMS\Extbase\Core\Bootstrap` to set the uid of an
 entity (`entityId`) which should be rendered via TypoScript
* this makes it possible to render multiple entities e.g. via fluid:

###### Example:

*TypoScript*:
<pre>
<code class="typoscript">
    lib.structuredDataMarkupExample < lib.structuredDataMarkup
    lib.structuredDataMarkupExample {
        settings {
            entity {
                className = Portrino\PxSemantic\SchemaOrg\Question
    
                id = TEXT
                id.data = field:uid
            }
            processors {
                0 {
                    className = Portrino\PxSemantic\Processor\ExampleProcessor
                }
            }
        }
    }
</code>
</pre>

*Fluid*:
```html
    <f:for each="{entities}" as="entity">
        {entity -> f:cObject(typoscriptObjectPath: 'lib.structuredDataMarkupExample')}
    </f:for>
```

1.1.0 - 2016-02-05
-------------------
* adds feature to set an id for an entity and the json+ld encoder will therefore set the "@id" property which was defined by json-ld standard
* adds Article, TechArticle, WebPage, Website entities
* adds some properties to Thing, CreativeWork
* fixes wrong inheritance for DataType

1.0.0 - 2016-01-22
-------------------
* initial import

