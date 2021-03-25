import rdflib
from rdflib import Namespace
import sys

g = rdflib.Graph()
g.namespace_manager.bind('rdf', Namespace('http://www.w3.org/1999/02/22-rdf-syntax-ns#'))
g.namespace_manager.bind('rdfs', Namespace('http://www.w3.org/2000/01/rdf-schema#'))
g.namespace_manager.bind('owl', Namespace('http://www.w3.org/2002/07/owl#'))
g.namespace_manager.bind('vel', Namespace('http://www.owl-ontologies.com/unnamed.owl#'))
g.namespace_manager.bind('foaf', Namespace('http://xmlns.com/foaf/0.1/'))
g.namespace_manager.bind('xsd', Namespace('http://www.w3.org/2001/XMLSchema#'))
g.parse("Velib.rdf")

g2 = rdflib.Graph()
g2.namespace_manager.bind('rdf', Namespace('http://www.w3.org/1999/02/22-rdf-syntax-ns#'))
g2.namespace_manager.bind('rdfs', Namespace('http://www.w3.org/2000/01/rdf-schema#'))
g2.namespace_manager.bind('owl', Namespace('http://www.w3.org/2002/07/owl#'))
g2.namespace_manager.bind('tgv', Namespace('http://www.owl-ontologies.com/unnamed.owl#'))
g2.namespace_manager.bind('foaf', Namespace('http://xmlns.com/foaf/0.1/'))
g2.namespace_manager.bind('xsd', Namespace('http://www.w3.org/2001/XMLSchema#'))
g2.parse("TGV.rdf")

if sys.argv[1] == "GARE":
    if sys.argv[2] == "ALL":
        filename = sys.argv[1] + "_" + sys.argv[2] + ".txt"
        with open("requetes/"+filename, 'r') as file:
            data = file.read().replace('\n', '')
        qres = g2.query(data)
    elif len(sys.argv)==4:
        number = sys.argv[3]
        filename = sys.argv[1] + "_" +sys.argv[2] + "_X"+ ".txt"
        with open("requetes/"+filename, 'r') as file:
            data = file.read().replace('param', number)
        qres = g2.query(data)
    for row in qres:
        print(row.asdict()['name'].toPython())
        print(row.asdict()['lat'].toPython())
        print(row.asdict()['long'].toPython())

elif sys.argv[1] == "VELIB":
    if(len(sys.argv)==4) : 
        number = sys.argv[3]
        filename = sys.argv[1] + "_" +sys.argv[2] + "_X"+ ".txt"
        with open("requetes/"+filename, 'r') as file:
            data = file.read().replace('param', number)
        qres = g.query(data)
        for row in qres:
            print(row.asdict()['name'].toPython())
            print(row.asdict()['lat'].toPython())
            print(row.asdict()['long'].toPython())
    else:
        filename = sys.argv[1] + "_" +sys.argv[2] + ".txt"
        with open("requetes/"+filename, 'r') as file:
            data = file.read().replace('\n', '')
        qres = g.query(data)
        for row in qres:
            print(row.asdict()['name'].toPython())
            print(row.asdict()['lat'].toPython())
            print(row.asdict()['long'].toPython())