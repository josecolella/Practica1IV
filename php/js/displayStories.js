/*
Copyright (C) 2013  Jose Miguel Colella

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/



/**
 * Funcion para que aparezca una ventana emergentes con las noticias
 * relacionadas de la misma
 * @return Ventana emergente con las noticias relacionadas
 */
 function openRelatedStoriesPopUp() {
  var strWindowFeatures = "menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes,width=600,height=300";
  windowObjectReference = window.open("", "Noticias Relacioneadas", strWindowFeatures);
  windowObjectReference.document.write('<section class="relatedStories">');
  windowObjectReference.document.write('<h4>Noticias relacionadas</h4>');
  windowObjectReference.document.write('<ul>');
  windowObjectReference.document.write('<li>');
  windowObjectReference.document.write('<a href="http://www.bbc.co.uk/news/world-europe-17433142">');
  windowObjectReference.document.write('<p>Perfil de Italia</p>');
  windowObjectReference.document.write('</a>');
  windowObjectReference.document.write('</li>');
  windowObjectReference.document.write('<li>');
  windowObjectReference.document.write('<a href="http://www.bbc.co.uk/news/world-europe-22323850">');
  windowObjectReference.document.write('<p>Enrico Letta, primer ministro designado por Giorgio Napolitano, crea nuevo gobierno</p>');
  windowObjectReference.document.write('</a>');
  windowObjectReference.document.write('</li>');
  windowObjectReference.document.write('<li>');
  windowObjectReference.document.write('<a href="http://www.bbc.co.uk/news/world-europe-22285883">');
  windowObjectReference.document.write('<p>Perfil del nuevo ministro Italiano, Enrico Letta</p>');
  windowObjectReference.document.write('</a>');
  windowObjectReference.document.write('</li>');
  windowObjectReference.document.write('<li>');
  windowObjectReference.document.write('<a href="http://www.bbc.co.uk/news/world-europe-21613940">');
  windowObjectReference.document.write('<p>Lider del Partido "Cinque Stelle" no quiere ligar su partido a otro</p>');
  windowObjectReference.document.write('</a>');
  windowObjectReference.document.write('</li>');
  windowObjectReference.document.write('<li>');
  windowObjectReference.document.write('<a href="http://www.bbc.co.uk/news/world-middle-east-22298563">');
  windowObjectReference.document.write('<p>&iquest;Pueden cooperar el nuevo gobierno de Italia creado de partidos de derecha e izquierda?</p>');
  windowObjectReference.document.write('</a>');
  windowObjectReference.document.write('</li>');
  windowObjectReference.document.write('</section>');
  windowObjectReference.focus();
}