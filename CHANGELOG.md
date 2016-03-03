# PxSemantic Change log

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

