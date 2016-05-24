.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt



.. _typoscript-configuration:

TypoScript Configuration
^^^^^^^^^^^^^^^^^^^^^^^^

Include PxSemantic in yout TypoScript Template
''''''''''''''''''''''''''''''''''''''''''''''''

Please include the static template of *PxSemantic* either through an include or through the general options.

To include the PxSemantic TS directly in your TS please use the following code:

setup:

- ``<INCLUDE_TYPOSCRIPT: source="FILE:EXT:px_semantic/Configuration/TypoScript/setup.txt">``

constants:

- ``<INCLUDE_TYPOSCRIPT: source="FILE:EXT:px_semantic/Configuration/TypoScript/constants.txt">``

TypoScript values
'''''''''''''''''

Use ``lib.structuredDataMarkup`` as default TS-Plugin and customize it to your needs.

The following TypoScript values could be configured within the settings section.

======================================================================================  ===========  =======================================================================================================  =========
TypoScript value                                                                        Data type    Description                                                                                              Default
======================================================================================  ===========  =======================================================================================================  =========
entity                                                                                  string       ClassName (**namespace syntax!**) of the entity which should be filled with data and encoded to JSON-LD  Portrino\PxSemantic\SchemaOrg\Thing
processors                                                                              array        Array of processors. Processors which were executed in order of the array keys.
processors.[index].className                                                            string       ClassName of the processor which should be executed
processors.[index].settings                                                             array        Array of options to configure the processor. Settings depend on the processor.
======================================================================================  ===========  =======================================================================================================  =========

Example - Render Page Information
'''''''''''''''''''''''''''''''''

The class ``Portrino\PxSemantic\Processor\PageProcessor`` brings you the possibility to embed structured data about
the current page into your website as json-ld code. In detail it extracts information like:

* title
* abstract
* starttime
* tstamp
* author
* image (first entry of resources->media collection)

from the current page and adds it to the ``Portrino\PxSemantic\SchemaOrg\CreativeWork`` (http://schema.org/CreativeWork).

::

    lib.structuredDataMarkupPageExample < lib.structuredDataMarkup
    lib.structuredDataMarkupPageExample {
        settings {
            # classname of the entity (root) which should be rendered
            entity = Portrino\PxSemantic\SchemaOrg\CreativeWork
            processors {
                # Processors should implement Portrino\PxSemantic\Processors\ProcessorInterface
                # Processors will be executed in order of the array keys
                0 {
                    className = Portrino\PxSemantic\Processor\PageProcessor
                    settings {
                        media {
                            height = 800
                            width = 800
                        }
                    }
                }
            }
        }
    }

.. hint::

    You can implement your own processors in your extension and add them to the chain of processors. Have a look in the "For Developers" section for this.

Use the TS to render the resulting JSON-LD code somewhere on your website. We put it into the `<HEAD>` because other
meta information are also located within the `<HEAD>` tag. But it doesn`t matter.

Google says:

    "You can embed data in a web page using schema.org field names and the new JSON-LD data format. JSON-LD is easy to"
    "produce with many widely available JSON encoders. The data, enclosed within the"
    "<script type="application/ld+json"> ... </script> tags as shown in the examples below, may be placed in either the"
    "<HEAD> or <BODY> region of the page that displays that event. Either way, it won't affect how your document appears"
    "in users' web browsers."

    -- Google Documentation [#f1]_


::

    page.headerData.1453734422 < lib.structuredDataMarkupPageExample

If you want to put it in your template you could make use fluids `cObject`-ViewHelper:

::

    <f:cObject typoscriptObjectPath="lib.structuredDataMarkupPageExample"></f:cObject>


Result:
"""""""
The result could be look like that. Google and other search engines are now able to understand your data.

::

    <script type="application/ld+json">
        {
          "@context": "http://schema.org/",
          "@type": "CreativeWork",
          "name": "Your Page Title",
          "image": "http://www.example.com/image.jpg",
          "author": {
            "@type":"Person",
            "name":"John Doe"
          },
          "datePublished": "2016-01-25",
          "description": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam"
        }
    </script>

Example - Render Corporate Contacts
'''''''''''''''''''''''''''''''''''

For example you want to markup your official website with information about your corporate contacts
(https://developers.google.com/structured-data/customize/contact-points) you can do it this way:

Declare your organization information and corporate contact via TypoScript.
We build a special TypoScriptProcessor which could be used to embed information as json-ld.

::

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

Result:
"""""""

::

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



.. [#f1] https://developers.google.com/structured-data/events/performers?rd=1#option_1_add_html_event_markup_directly
