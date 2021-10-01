create user oci identified by oci;
grant connect, resource, all privileges, dba to oci;


create table kampus(
    idkampus varchar(10) constraint pk_kampus primary key,
    nama varchar2(25),
    alamat varchar2(25)
);
