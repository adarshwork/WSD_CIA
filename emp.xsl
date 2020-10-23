<?xml version="1.0" encoding="UTF-8"?> 
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
<xsl:template match="/"> 
<html> 
<body> 
<h1 align="center">Employee Management System</h1> 
<table border="3" align="center"> 
<tr> 
	<th>ID</th> 
	<th>NAME</th> 
	<th>AGE</th> 
	<th>SALARY</th>
	<th>EMAIL</th>
	<th>MobNum</th>
	<th>DESIGNATION</th> 
	<th>PROMOTION</th>
</tr> 
	<xsl:for-each select="Company/Employee"> 
<tr> 
    <td><xsl:value-of select="Emp-id"/></td>
	<td><xsl:value-of select="Emp-name"/></td> 
	<td><xsl:value-of select="Emp-age"/></td> 
	<td><xsl:value-of select="Emp-salary"/></td> 
	<td><xsl:value-of select="Emp-emailid"/></td> 
	<td><xsl:value-of select="Emp-Phonenum"/></td>
	<td><xsl:value-of select="Emp-designation"/></td>
	<xsl:if test="Emp-age &gt;= 50">
	<td>
	Associate Project Manager
	</td>
	</xsl:if>
	<xsl:if test="Emp-age &gt;= 40 and Emp-age &lt;= 49">
	<td>
	Team Leader
	</td>
	</xsl:if>
	<xsl:if test="Emp-age &lt; 40">
	<td>
	Developer
	</td>
	</xsl:if>
</tr> 
	</xsl:for-each> 
</table> 
</body> 
</html> 
</xsl:template> 
</xsl:stylesheet> 
