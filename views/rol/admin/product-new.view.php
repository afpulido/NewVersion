        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="user-update.html">
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PRODUCTO
                </h3>
                <p class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque laudantium necessitatibus eius iure adipisci modi distinctio. Earum repellat iste et aut, ullam, animi similique sed soluta tempore cum quis corporis!
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="item-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PRODUCTO</a>
                    </li>
                    <li>
                        <a href="item-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRIODUCTOS</a>
                    </li>
                    <li>
                        <a href="item-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PRODUCTO</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENT-->
            <div class="container-fluid">
				<form action="" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="far fa-plus-square"></i> &nbsp; Información del producto</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_codigo" class="bmd-label-floating">Código Producto</label>
										<input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="product_id" id="product_id" maxlength="45">
									</div>
								</div>
								
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_nombre" class="bmd-label-floating">Tipo</label>
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="type" id="type" maxlength="140">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_nombre" class="bmd-label-floating">Descripción</label>
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="description" id="description" maxlength="140">
									</div>
								</div>
                                <div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_nombre" class="bmd-label-floating">Marca</label>
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="mark" id="mark" maxlength="140">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="item_estado" class="bmd-label-floating">Colección</label>
										<select class="form-control" name="colection" id="colection">
											<option value="" selected="" disabled="">Seleccione una opción</option>
											<option value="">Verano</option>
											<option value="">Invierno</option>
											<option value="">Regreso a Clases</option>
											<option value="">Día de la Madre</option>
                                            <option value="">Día del Padre</option>
                                            <option value="">Black Friday</option>
                                            <option value="">Cyber Monday</option>
											<option value="">Navidad</option>
										</select>
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="item_estado" class="bmd-label-floating">Género</label>
										<select class="form-control" name="gender" id="gender">
											<option value="" selected="" disabled="">Seleccione una género</option>
											<option value="">Niño</option>
											<option value="">Niña</option>
											<option value="">Hombre</option>
											<option value="">Mujer</option>
										</select>
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="item_estado" class="bmd-label-floating">Talla</label>
										<select class="form-control" name="size" id="size">
											<option value="" selected="" disabled="">Seleccione una talla</option>
											<option value="">34</option>
                                            <option value="">35</option>
											<option value="">36</option>
                                            <option value="">37</option>
                                            <option value="">38</option>
											<option value="">39</option>
                                            <option value="">40</option>
                                            <option value="">41</option>
											<option value="">42</option>
                                            <option value="">43</option>
                                            <option value="">44</option>
										</select>
									</div>
								</div>
                                <div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_nombre" class="bmd-label-floating">Unidades</label>
										<input type="number" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="stock" id="stock" maxlength="140">
									</div>
								</div>
                                <div class="col-12 col-md-4">
									<div class="form-group">
										<label for="item_nombre" class="bmd-label-floating">Precio de compra</label>
										<input type="number" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="buy_price" id="buy_price" maxlength="140">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="item_detalle" class="bmd-label-floating">Cargar Imagen</label>
										<input type="file" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,190}" class="form-control" name="product_image" id="product_image" maxlength="190">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="item_estado" class="bmd-label-floating">Seleccione el código del inventario</label>
										<select class="form-control" name="inventory_id" id="inventory_id">
											<option value="" selected="" disabled="">Seleccione una opción</option>
											<option value="">1</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
					</p>
				</form>
			</div>
        </section>
    </main>
