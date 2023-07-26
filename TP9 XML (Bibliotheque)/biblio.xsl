<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    xmlns:math="http://www.w3.org/2005/xpath-functions/math"
    xmlns:xd="http://www.oxygenxml.com/ns/doc/xsl"
    exclude-result-prefixes="xs math xd"
    version="3.0">
    
    <xsl:template match="/">
        <head>
            <title>Bibliotheque</title>
            <style>
                table {
                    width: 800px;
                }
            </style>
        </head>
        <body>
            <h1>Bibliotheque</h1>
            <hr/>
            <xsl:for-each select="bibliotheque/etudiant">
                <h3><xsl:value-of select="@nom"/> &#160; <xsl:value-of select="@prenom"/></h3>
                <a href="mailto:{@email}"><button>Envoyer mail</button></a>
                <table border="1" cellspacing="0">
                    <tr>
                        <th>ID</th><th>Titre</th><th>Date pret</th><th>Rendu</th>
                    </tr>
                    <xsl:for-each select="livre">
                        <tr>
                            <td><xsl:value-of select="@id"/></td>
                            <td><xsl:value-of select="@titre"/></td>
                            <td><xsl:value-of select="@datePret"/></td>
                            <td><xsl:value-of select="@rendu"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </xsl:for-each>
        </body>
    </xsl:template>
    
</xsl:stylesheet>