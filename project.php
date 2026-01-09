<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
        <style>
           html, body {
             height: 100%; 
             margin: 0;
             padding: 0;
             background-color: #f7f9faff;
             font-family: 'Poppins', sans-serif;
            }

           .header {
              display: flex;
              justify-content: space-between;
              align-items: center;
              background-color: #e6f2ff;
              padding: 20px ;
              border-radius: 20px;
              box-shadow: 0 4px 8px rgba(197, 161, 161, 0.1);
              position: relative;
            }

           .leftsection .img{
             width: 150px;
             height: 150px;
             object-fit: contain;
             border-radius: 2px;
            }

           .rightsection .open {
             width: 150px;
             height: 100px;
             object-fit: contain;
             border-radius: 2px;
            }

           .letitre {
             position: absolute;
             left: 50%;
             transform: translateX(-50%);
             font-weight:bolder;
             background-color: rgba(250,246,246,0.8);
             border-radius: 50px;
             text-align: center;
             text-shadow: 2px 2px 4px rgba(230,170,200,0.3);
             padding: 15px 30px;
             box-shadow: 0 2px 5px rgba(197, 161, 161, 0.2);
             letter-spacing: 1px;
             font-family: 'Great Vibes', cursive;
             font-size:42px;
             color:black;
            }              

           .client, .produits, .achats, .ventes, .detail, .fournisseur, .vendeur, .about {
              background-color: #dff0faff;
             height: 160px;
             display: flex;
             justify-content: center;
             align-items: center;
             border-radius: 20px;
             transition: background-color 0.3s ease;
             box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            }

           .menu-button {
             width: 130px;
             height: 130px;
             background-color: #f5f6f7ff;
             display: flex;
             flex-direction: column;
             align-items: center;
             justify-content: center;
             border: none;
             border-radius: 20px;
             cursor: pointer;
             transition: transform 0.3s ease, box-shadow 0.3s ease;
             box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }

           .menu-button:hover {
             background-color: #bfe3fcff;
              transform: scale(1.05);
              box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            }

           .menu-img {
             width: 60px;
             height: 60px;
             object-fit: contain;
             margin-bottom: 10px;
            }

           .menu-titel {
             text-align: center;
             font-family: 'Playfair Display',serif;
             font-size: 20px;
             color:black;
             letter-spacing: 1px;
            }
           .lien {
             text-decoration: none;
             color: inherit;
            }
            .logout-btn {
              background-color: #bfe3fcff;   
              color: #000000;              
              padding: 10px 28px;
              border-radius: 25px;
              text-decoration: none;
              font-size: 15px;
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              font-weight: 500;
              display: inline-block;
              box-shadow: 0 4px 8px rgba(77, 168, 218, 0.25);
              transition: background-color 0.3s ease;
            }

.logout-btn:hover {
    background-color: #d8ecfbff;   
    color: #000000;              
}

           .M {
             width: 25px;
             height: 25px;
            }

        </style>
    </head>
    <body>
        <div class="header">
            <div class="leftsection">
                <img class="img" src ="store.png">
            </div>
            <div class="rightsection">
              <div class="titre-M">
                 <p class="letitre">Stock
                    <img src="letter-m.png" class="M">anagement
                 </p>
              </div>
               <img class="open"  src="open.png">
            </div>
        </div>
        <div>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; column-gap: 10px; row-gap: 10px; margin-top: 30px;">
                <div class="client">
                    <a target="_self" href="display.php" class="lien">
                        <button class="menu-button">
                        <img class="menu-img" src="client.png">
                        <span class="menu-titel">Client</span>
                    </button></a>
                </div>
                <div class="produits">
                   <a target="_self" href="products.php"  class="lien">
                    <button class="menu-button">
                        <img class="menu-img" src="produits.png">
                        <span class="menu-titel">Products</span>
                    </button> 
                   </a>
                </div>
                <div class="achats">
                  <a target="_self" href="purchases.php" class="lien">
                    <button class="menu-button">
                        <img class="menu-img" src="achats.png">
                        <span class="menu-titel">Purchases</span>
                    </button>
                  </a>
                </div>
                <div class="ventes">
                   <a target="_self" href="sales.php" class="lien">
                    <button class="menu-button">
                        <img class="menu-img" src="vente.png">
                        <span class="menu-titel">Sales</span>
                    </button>
                  </a>
                </div>

            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; column-gap: 10px; row-gap: 10px; margin-top: 10px;">
                <div class="detail">
                   <a target="_self" href="detail.php" class="lien">
                    <button class="menu-button">
                        <img class="menu-img" src="detail.png">
                        <span class="menu-titel">Detail</span>
                    </button>
                   </a>
                </div>
                <div class="fournisseur">
                 <a target="_self" href="supplier.php" class="lien">
                    <button class="menu-button">
                        <img class="menu-img" src="fournisseur.png">
                        <span class="menu-titel">Supplier</span>
                    </button>
                 </a>
                </div>
                <div class="vendeur">
                   <a target="_self" href="seller.php" class="lien">
                    <button class="menu-button">
                        <img class="menu-img" src="vendeur.png">
                        <span class="menu-titel">Seller</span>
                    </button>
                   </a>
                </div>
                <div class="about">
                   <a target="_self" href="store.php" class="lien">
                    <button class="menu-button">
                        <img class="menu-img" src="market.png">
                        <span class="menu-titel">About </span>
                    </button>
                   </a>
                </div>
            </div>
        </div>

        <div style="margin-top: 20px;">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>

    </body>
</html>


