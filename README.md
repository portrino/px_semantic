# px_semantic 2.5.0 (beta)
Structured Data Markup Rendering for TYPO3 with JSON-LD

**PxSemantic** provides an extrem dynamic and highly customizable solution to embed structured data on your website 
and enrich them with information about your website. The currently supported classes are a subset of the vocabulary 
defined on https://schema.org/ and were generated with the schema generator from https://api-platform.com/. At the
moment we only support [json-ld](http://json-ld.org/) format to encode LinkedData.

Before you start: 
* Download / Import from [TER](http://typo3.org/extensions/repository/view/px_semantic) or [GitHub](https://github.com/portrino/px_semantic)
* Install the Extension
* Include Static Template Files!

### Example 1 - Render Organization Information

For example you want to markup your official website with information about your corporate contacts 
(https://developers.google.com/structured-data/customize/contact-points) you can do it this way:

Declare your organization information and corporate contact via TypoScript. 

###### TypoScript:
<pre>
<code class="typoscript">
lib.structuredDataMarkupOrganization < lib.structuredDataMarkup
lib.structuredDataMarkupOrganization {
    settings {
        entity = Portrino\PxSemantic\SchemaOrg\Organization
        processors {
            # processor to set properties of an entity via TypoScript
            0 {
                className = Portrino\PxSemantic\Processor\TypoScriptProcessor
                settings {
                    # for string values you do not have to use TEXT datatype, you can just write "key = value"
                    # US, GB, DE
                    areaServed = DE

                    contactPoint {
                        # "customer support", "technical support", "billing support", ...
                        contactType = customer support
                        telephone = +49-123-456-78
                    }

                    logo {
                        # get the logo image uri via TS and prepend the baseUrl to get the absolute path
                        url = IMG_RESOURCE
                        url {
                            file = fileadmin/company_logo.png
                            stdWrap.wrap = {TSFE:baseUrl}|
                            stdWrap.insertData = 1
                        }
                    }
                    # special datatype from px_semantic EXT to define arrays
                    sameAs = Portrino\PxSemantic\Converter\ArrayConverter
                    sameAs {
                        0 = http://www.facebook.com/yourSite/
                        1 = http://www.youtube.com/user/yourSite/
                        2 = http://www.pinterest.com/yourSite/
                    }
                    # use typolink to generate link to the root page
                    url = TEXT
                    url.typolink {
                        parameter = 1
                        returnLast = url
                    }
                }
            }
        }
    }
}

</code>
</pre>

Use the TS to render the resulting JSON-LD code somewhere on your website. We put it into the `<HEAD>` because other
meta information are also located within the `<HEAD>` tag. But it doesn`t matter.
  
Google says:
> You can embed data in a web page using schema.org field names and the new JSON-LD data format. JSON-LD is easy to
> produce with many widely available JSON encoders. The data, enclosed within the 
> `<script type="application/ld+json"> ... </script>` tags as shown in the examples below, may be placed in either the 
> <HEAD> or <BODY> region of the page that displays that event. Either way, it won't affect how your document appears 
> in users' web browsers.
> -- <cite>[Google Documentation][1]</cite>

[1]:https://developers.google.com/structured-data/events/performers?rd=1#option_1_add_html_event_markup_directly

###### TypoScript:
<pre>
<code class="typoscript">

page.headerData.1453734422 < lib.structuredDataMarkupOrganization

</code>
</pre>

If you want to put it in your template you could make use fluids `cObject`-ViewHelper:

###### Fluid:
```html
<f:cObject typoscriptObjectPath="lib.structuredDataMarkupOrganization"></f:cObject>
```

This will result in the following JSON-LD Markup on your page

```html
<script type="application/ld+json">
{
    "@context" : "http://schema.org",
    "@type" : "Organization",
    "areaServed":"DE"
    "url" : "http://www.your-company-site.com",
    "contactPoint" : {
        "@type" : "ContactPoint",
        "areaServed":"DE",
        "telephone" : "+49-123-456-78",
        "contactType" : "customer support"    
    },
    "logo": {
        "@type":"ImageObject",
        "url":"http://www.your-company-site.com/fileadmin/company_logo.png"
    },
    "sameAs":[
        "http:\\www.facebook.com\yourSite",
        "http:\\www.youtube.com\user\yourSite",
        "http:\\www.pinterest.com\yourSite\"
    ]
}
</script>
```


### Example 2 - Render Multiple Entities

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


### Example 3 - Create LinkedData REST API

Since version **2.0.0** it is possible to configure an LinkedData REST API which is based on Hydra Core Vocabulary (http://www.hydra-cg.com/spec/latest/core/)

*TypoScript*:

* create a page e.g. called "api (123)" within your page tree for better realurl configuration

*constants.txt*
<pre>
<code class="typoscript">
plugin.tx_pxsemantic {
    settings {
            rest {
                pid = 123
            }
        }
    }        
}
</code>
</pre>

* now configure for each endpoint of your rest api the resource to entity mapping like in the easy example below
* as for strcutured data markup in exampe 1 and example 2 you could (re)use `processors` to transform your 
  resource (aka domain model) into an http://schema.org/ entity

*setup.txt*
<pre>
<code class="typoscript">
plugin.tx_pxsemantic {
    settings {
            rest {
                endpoints {
                    pages {
                        entity = Portrino\PxSemantic\SchemaOrg\CreativeWork
                        resource = Portrino\PxSemantic\Domain\Model\Page
                        processors {
                            0 {
                                className = Portrino\PxSemantic\Processor\PageProcessor
                            }
                        }
                    }
                }
            }
        }
    }        
}
</code>
</pre>


* add this realurl configuration for nicer uris of your rest API

*realurl_conf.php*
<pre>
<code class="php">
...
  
  'fixedPostVars' => [
        '_DEFAULT' => [],
        'api' => [
            [
                'GETvar' => 'type',
                'valueMap' => [
                    'structured-data' => 1475825939,
                    'structured-data-contexts' => 1476721757,
                    'vocab' => 1476770090
                ]
            ],
            [
                'GETvar' => 'tx_pxsemantic_hydraapi[endpoint]',
                'valueMap' => [
                    'recipes' => 'recipes',
                    'pages' => 'pages'
                ],
                'noMatch' => 'bypass'
            ],
            [
                'GETvar' => 'tx_pxsemantic_hydracontext[context]',
                'valueMap' => [
                    'Entrypoint' => 'Entrypoint',
                ],
                'noMatch' => 'bypass'
            ],
            [
                'cond'        => [
                    'prevValueInList' => 'pages'
                ],
                'GETvar'      => 'tx_pxsemantic_hydraapi[uid]',
                'lookUpTable' => [
                    'table'       => 'pages',
                    'id_field'    => 'uid',
                    'alias_field' => 'uid'
                ],
                'optional'    => true
            ]
        ],
        '123' => 'api'
    ],
    
...
</code>
</pre>

* now you can call your Linked Data REST API via: http://domain.tld/api/structured-data/pages/ which will be presented 
  as PagedCollection (http://www.hydra-cg.com/spec/latest/core/#collections)
  
* add this url to hydra console (http://www.markus-lanthaler.com/hydra/console/) will give you a nice hydra documentation

# More Examples

* Could be found under: https://github.com/portrino/px-semantic-demo
 
