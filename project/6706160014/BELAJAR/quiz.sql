create table pinjam (
    no_pinjam varchar2(6) constraint pk_pinjam primary key,
    tgl date
);

create table kategori (
    kode_kategori varchar2(5) constraint pk_kategori primary key,
    kategori varchar2(20) 
);

create table buku (
    kode_buku varchar2(6) constraint pk_buku primary key,
    judul varchar2(25),
    kode_kategori varchar2(5),
    stok number,
    constraint fk_kategori foreign key(kode_kategori) references kategori on delete cascade 
);

create table detail_pinjam (
    no_pinjam varchar2(6),
    kode_buku varchar2(6),
    jumlah number,
    constraint fk_pinjam foreign key(no_pinjam) references pinjam on delete cascade,
    constraint fk_buku foreign key(kode_buku) references buku on delete cascade
);



insert into kategori values ('COM','Computer');
insert into kategori values ('TRV','Travelling');

insert into pinjam values ('P0001','10/12/2016');
insert into pinjam values ('P0002','10/12/2016');
insert into pinjam values ('P0003','12/12/2016');

insert into detail_pinjam values ('P0001','10100', 3);
insert into detail_pinjam values ('P0001','10200', 5);
insert into detail_pinjam values ('P0001','10300', 2);
insert into detail_pinjam values ('P0002','10500', 3);
insert into detail_pinjam values ('P0003','10600', 6);

insert into buku values ('10100','Situs Web','COM',43);
insert into buku values ('10200','Situs Web','COM',43);
insert into buku values ('10300','Situs Web','COM',43);
insert into buku values ('10400','Situs Web','COM',43);
insert into buku values ('10500','Situs Web','COM',43);
insert into buku values ('10600','Situs Web','COM',43);