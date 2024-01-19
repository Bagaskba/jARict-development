import React, { useEffect, useContext, useState } from 'react'
import {
  Text,
  View,
  StyleSheet,
  ScrollView,
  Image,
  TouchableOpacity,
} from 'react-native'
import ScreenTemplate from '../../components/ScreenTemplate'
import Button from '../../components/Button'
import { colors, fontSize } from 'theme'
import { ColorSchemeContext } from '../../context/ColorSchemeContext'
import { UserDataContext } from '../../context/UserDataContext'
import { useNavigation } from '@react-navigation/native'
import Headerlogo from '../../components/Headerlogo'
import {
  logo,
  produk,
  reservasi,
  serum,
  toner,
  facial,
  cream,
} from '../../../assets'

export default function cart() {
  const navigation = useNavigation()
  const { userData } = useContext(UserDataContext)
  const { scheme } = useContext(ColorSchemeContext)
  const isDark = scheme === 'dark'
  const colorScheme = {
    text: isDark ? colors.white : colors.primaryText,
  }
  const [isChecked, setIsChecked] = useState(false)
  const [isCheckedBottom, setIsCheckedBottom] = useState(false)

  const handleCheck = () => {
    setIsChecked(!isChecked)
  }
  const handleCheckBot = () => {
    setIsCheckedBottom(!isCheckedBottom)
  }

  useEffect(() => {
    console.log('Cart screen')
  }, [])

  const buttonPress = () => {
    navigation.navigate('checkout')
    // console.log('button press')
  }
  const [count, setCount] = useState(0)

  const handleIncrement = () => {
    setCount(count + 1)
  }

  const handleDelete = () => {
    console.log('data deleted')
  }

  const handleDecrement = () => {
    if (count > 0) {
      setCount(count - 1)
    }
  }

  return (
    <ScreenTemplate>
      <Headerlogo />
      <View style={{ alignItems: 'center', paddingVertical: 20 }}>
        <Text
          style={{
            color: colors.warnaFont,
            fontSize: 30,
            textTransform: 'uppercase',
            fontWeight: 'bold',
          }}
        >
          Keranjang
        </Text>
      </View>
      <View
        style={[
          styles.cardContain,
          { paddingHorizontal: 20, paddingVertical: 20 },
        ]}
      >
        <TouchableOpacity
          style={styles.checkboxContainer}
          onPress={handleCheck}
        >
          <View
            style={[
              styles.checkbox,
              isChecked && styles.checked,
              { width: 10, height: 9 },
            ]}
          />
        </TouchableOpacity>
        <Image source={serum} style={{ marginLeft: 25 }} />
        <View style={{ flexDirection: 'column', marginTop: 20 }}>
          <Text
            style={[
              styles.marginbot,
              { textTransform: 'uppercase', fontWeight: 'bold', fontSize: 15 },
            ]}
          >
            Serum
          </Text>
          <View style={{ flexDirection: 'row', alignItems: 'center' }}>
            <TouchableOpacity onPress={handleDecrement} disabled={count === 0}>
              <Text style={[styles.button, count === 0 && styles.disabled]}>
                -
              </Text>
            </TouchableOpacity>
            <Text style={styles.count}>{count}</Text>
            <TouchableOpacity onPress={handleIncrement}>
              <Text style={styles.button}>+</Text>
            </TouchableOpacity>
          </View>
          <Text style={{ marginTop: 10 }}>Rp.125.000,00</Text>
          <TouchableOpacity
            onPress={handleDelete}
            style={{
              position: 'absolute',
              left: 150,
              borderWidth: 1,
              borderColor: colors.warnaFont,
              borderRadius: 5,
            }}
          >
            <Text style={{ color: 'red', fontWeight: 'bold', fontSize: 18 }}>
              X
            </Text>
          </TouchableOpacity>
        </View>
      </View>
      <View style={styles.totalContain}>
        <TouchableOpacity
          style={styles.checkboxContainer2}
          onPress={handleCheckBot}
        >
          <View
            style={[
              styles.checkbox,
              isCheckedBottom && styles.checked,
              { width: 10, height: 9 },
            ]}
          />
        </TouchableOpacity>
        <Text
          style={{
            paddingHorizontal: 20,
            color: 'white',
            fontWeight: 'bold',
            fontSize: 20,
          }}
        >
          Pilih Semua
        </Text>
        <Text
          style={{ color: colors.warnaFont, fontWeight: 'bold', fontSize: 20 }}
        >
          Rp. 0
        </Text>
      </View>
      <Button
        label="Checkout"
        color={colors.warnaFont}
        onPress={() => buttonPress()}
      />
    </ScreenTemplate>
  )
}

const styles = StyleSheet.create({
  container: {
    flexDirection: 'row',
    alignItems: 'center',
  },
  totalContain: {
    display: 'flex',
    flexDirection: 'row',
    backgroundColor: '#DD7272',
    position: 'absolute',
    bottom: 0,
    width: '100%',
    paddingVertical: 80,
  },
  cardContain: {
    display: 'flex',
    flexDirection: 'row',
    backgroundColor: colors.grey,
  },
  button: {
    fontSize: 20,
    padding: 6,
    borderWidth: 1,
    borderColor: 'black',
    borderRadius: 5,
    marginHorizontal: 5,
  },
  marginbot: {
    marginBottom: 10,
  },
  disabled: {
    opacity: 0.5,
  },
  count: {
    fontSize: 20,
    marginHorizontal: 10,
  },
  checkboxContainer: {
    position: 'absolute',
    top: 80,
    left: 20,
    borderWidth: 1,
    borderColor: 'black',
    borderRadius: 5,
    padding: 5,
    backgroundColor: 'white',
  },
  checkboxContainer2: {
    marginLeft: 20,
    borderWidth: 1,
    borderColor: 'black',
    borderRadius: 5,
    padding: 5,
    backgroundColor: 'white',
  },
  checkbox: {
    backgroundColor: 'white',
    borderRadius: 3,
  },
  checked: {
    backgroundColor: colors.warnaFont, // Ganti warna sesuai keinginan Anda
  },
})
