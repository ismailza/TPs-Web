<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    xmlns:math="http://www.w3.org/2005/xpath-functions/math"
    xmlns:xd="http://www.oxygenxml.com/ns/doc/xsl"
    exclude-result-prefixes="xs math xd"
    version="3.0">
    <xsl:template match="/">
        <body>
            <xsl:for-each select="operateur/client">
                <h2>Nom du client : <xsl:value-of select="@nom"/></h2>
                <table border="1">
                    <tr>
                        <th>Num Abonnement</th>
                        <th>Type</th>
                        <th>Date Abonnement</th>
                        <th>Montant total des factures</th>
                    </tr>
                    <xsl:for-each select="abonnement">
                        <tr>
                            <td><xsl:value-of select="@num"/></td>
                            <td><xsl:value-of select="@type"/></td>
                            <td><xsl:value-of select="@dateAb"/></td>
                            <td><xsl:value-of select="sum(facture/@montant)"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </xsl:for-each>
        </body>
    </xsl:template>
</xsl:stylesheet>