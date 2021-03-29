<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
  <html>

      <head>
        <title>Products</title>
        <style>

          h2
            {
                padding-top: 40px;
                text-align: center;
                font-size: 30px;
                text-decoration: underline;
                text-underline-position: under;
                text-decoration-color: #7700C6;
          }

          button
          {

            background-color:#b48fcc;
            border: none;
            width: 100px;
            height: 35px;
            border-radius: 15px;
            float: right;
          }

          table
          {
                width: 100%;
                border-collapse: collapse;
          }

          th
          {
            padding: 12px 15px;
            border:1px solid #ddd;
            text-align: center;
          } 

          table td 
          {
            padding: 12px 15px;
            border:1px solid #ddd;
            text-align: center;
          } 

          table td img 
          {
            margin:30px;
            width: 180px;
            height: 150px;
          }  

          table td button 
          {
            background-color:#b48fcc;
            border: none;
            width: 75px;
            height: 30px;
            border-radius: 15px;
          }        
          
        </style>
      </head>

      <body>
          <h2>All Products</h2>

          <a href="addProduct.php"><button>Add product</button></a>
            <table>
                <tr>
                  <th>Index</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                </tr>
                
                <xsl:for-each select="products/product">
                <tr>
                  <td><xsl:value-of select="@id"/></td>
                  
                  <td><img src="img/{img}"></img></td>
                  <td><xsl:value-of select="Name/text()"/></td>
                  <td>Rs <xsl:value-of select="Price/text()"/></td>
                  <td><xsl:value-of select="Description/text()"/></td>
                  <td><a href="editProduct.php"><button>Edit</button></a></td>
                  <td><a href="" onclick="return confirm('Are you sure?')"><button>Delete</button></a></td>
                </tr>
                </xsl:for-each>
                
            </table>
            
       </body>
  </html>
  </xsl:template>
</xsl:stylesheet>

