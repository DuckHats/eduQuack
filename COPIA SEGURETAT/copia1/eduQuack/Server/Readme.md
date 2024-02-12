# Manual d'Instal·lació: Xat en Temps Real amb Node.js i Socket.io

## Requisits Previs

- **Node.js i npm:** Assegura't que tens Node.js i npm instal·lats al teu sistema. Pots descarregar-los des de [nodejs.org](https://nodejs.org/).

## Pasos per Configurar el Servidor de Xat en Temps Real

1. **Descarregar el Codi del Repositori:**

   ```
   git clone [URL_DEL_REPOSITORI]
   cd nom_de_la_carpeta_del_projecte
   ```

2. **Instal·lar les Dependències:**

   Des de la carpeta del projecte, executa el següent comandament per instal·lar totes les dependències del projecte:

   ```
   npm install
   ```

3. **Configurar el Fitxer `index.js`:**

   Obre el fitxer `index.js` i verifica les següents configuracions:

   - **Direcció IP i Port:** Assegura't que el servidor estigui configurat per escoltar a la IP i port desitjats. Pots canviar la IP a `0.0.0.0` per escoltar totes les interfícies de xarxa.

     ```javascript
     const IP_ADDRESS = '0.0.0.0'; // O la teva adreça IP específica
     const PORT = 3000; // O el port que desitgis utilitzar
     ```

4. **Executar el Servidor:**

   Executa el següent comandament per iniciar el servidor:

   ```
   node index.js
   ```

5. **Accedir a l'Aplicació:**

   Obre el teu navegador web i accedeix a la següent URL:

   ```
   http://IP_DEL_SERVIDOR:PORT
   ```

   Ara hauries de ser capaç de veure l'aplicació de xat en temps real i enviar missatges entre els usuaris connectats.

## Dependències del Projecte

- **Express:** Framework web per a Node.js.
- **Socket.io:** Biblioteca de comunicació en temps real per a Node.js.
- **(Altres Dependències si escau)**

## Problemes Comuns i Solucions

- **ERR_CONNECTION_REFUSED:** 
Verifica que el servidor estigui en execució i escoltant a la IP i port correctes. Assegura't que el teu firewall permeti connexions a aquest port.

Amb aquests passos, hauries de ser capaç d'instal·lar i configurar correctament el teu servidor de xat en temps real amb Node.js i Socket.io. Si experimentes qualsevol problema o tens alguna pregunta, no dubtis en consultar la documentació de les dependències o demanar ajuda a la comunitat. Bon desenvolupament.
