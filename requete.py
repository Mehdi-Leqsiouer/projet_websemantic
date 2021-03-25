# -- coding: utf-8 --
"""
Created on Wed Mar 24 17:57:43 2021

@author: mouni
"""

import rdflib
from rdflib import Namespace

g = rdflib.Graph()
g.namespace_manager.bind('rdf', Namespace('http://www.w3.org/1999/02/22-rdf-syntax-ns#'))
g.namespace_manager.bind('rdfs', Namespace('http://www.w3.org/2000/01/rdf-schema#'))
g.namespace_manager.bind('owl', Namespace('http://www.w3.org/2002/07/owl#'))
g.namespace_manager.bind('vel', Namespace('http://www.owl-ontologies.com/unnamed.owl#'))
g.namespace_manager.bind('foaf', Namespace('http://xmlns.com/foaf/0.1/'))
g.namespace_manager.bind('xsd', Namespace('http://www.w3.org/2001/XMLSchema#'))

g.parse("Velib.rdf")

                                          
g2= rdflib.Graph()
g2.namespace_manager.bind('rdf', Namespace('http://www.w3.org/1999/02/22-rdf-syntax-ns#'))
g2.namespace_manager.bind('rdfs', Namespace('http://www.w3.org/2000/01/rdf-schema#'))
g2.namespace_manager.bind('owl', Namespace('http://www.w3.org/2002/07/owl#'))
g2.namespace_manager.bind('tgv', Namespace('http://www.owl-ontologies.com/unnamed.owl#'))
g2.namespace_manager.bind('foaf', Namespace('http://xmlns.com/foaf/0.1/'))
g2.namespace_manager.bind('xsd', Namespace('http://www.w3.org/2001/XMLSchema#'))                                      
                                          
g2.parse("TGV.rdf")

num = 5

qres = g2.query(
    """SELECT *
WHERE {
    ?station tgv:name "Perpignan" ;
             tgv:latitude ?lat ;
             tgv:longitude ?long ; ;
}""")


for row in qres:
     #print(str(row.asdict()['name'].toPython()))
     #print(str(row.asdict()['installed'].toPython()))
     print(str(row.asdict()['lat'].toPython()))
     print(str(row.asdict()['long'].toPython()))
     #print(str(row.asdict()['numbikes'].toPython()))