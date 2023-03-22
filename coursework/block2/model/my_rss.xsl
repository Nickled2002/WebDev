<?xml version="1.0" encoding="utf-8"?> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
<xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>
    
<xsl:template match="/">
	<xsl:apply-templates select="//story[position() &lt;= 6]" />
</xsl:template>

<xsl:template match="story">
<xsl:element name="div">
	<xsl:attribute name="class"><xsl:text>col-sm-4 d-flex align-items-stretch</xsl:text></xsl:attribute>
<xsl:element name="div">
	<xsl:attribute name="class"><xsl:text>card my-1</xsl:text></xsl:attribute>

	<xsl:element name="div">
		<xsl:attribute name="class"><xsl:text>card-header text-light</xsl:text></xsl:attribute>
		<xsl:element name="h3"><xsl:value-of select="story_name" /></xsl:element>
	</xsl:element>

	<xsl:element name="div">
		<xsl:attribute name="class"><xsl:text>card-body</xsl:text></xsl:attribute>
		<xsl:element name="p">
			<xsl:value-of select="story_description" />
			<xsl:element name="br" />
			<span class="bold"><xsl:value-of select="story_date" /></span>
		</xsl:element>
	</xsl:element>

	<xsl:element name="div">
		<xsl:attribute name="class"><xsl:text>card-footer</xsl:text></xsl:attribute>
		<xsl:text>Data &#169;NLE 2001975</xsl:text>
	</xsl:element>
	


</xsl:element>
	<xsl:element name="br" />
</xsl:element>

</xsl:template>


</xsl:stylesheet>
